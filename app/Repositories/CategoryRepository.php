<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository {
    public static function getAll($isAllActive = false) {
        $childrenQuery = function ($query) use ($isAllActive) {
            $query->with("media")->where('status', 1);

            if (!$isAllActive) {
                $query->where('is_visible_on_home', 1);
            }
        };

        $whereConditions = [
            ['status', 1],
            ['parent_id', 0],
        ];

        if (!$isAllActive) {
            $whereConditions[] = ['is_visible_on_home', 1];
        }

        return Category::with(['children' => $childrenQuery])
            ->where($whereConditions)
            ->get();
    }


    public static function getAllActive() {
        return self::getAll(true);
    }

    public static function list(Request $request) {
        $row_per_page = $request->input("row_per_page", 10);
        $list = Category::with('children')->where('parent_id', 0)->latest()->paginate($row_per_page);
        return $list;
    }

    public static function save(Request $request): Category {
        $data = $request->only([
            "title", "slug", "parent_id", "icon", "status", "is_visible_on_home"
        ]);
        if ($request->id) {
            $category = Category::find($request->id);
            $category->update($data);
            if ($request->hasFile('icon')) {
                $existingMedia = $category->media()->first();

                if ($existingMedia) {
                    MediaRepository::update($existingMedia, $request->file('icon'), 'category');
                } else {
                    MediaRepository::create($request->file('icon'), $category, 'category');
                }
            }
        } else {
            $category = Category::create($data);

            if ($request->hasFile('icon')) {
                MediaRepository::create($request->file('icon'), $category, 'category');
            }
        }

        return $category;
    }

    public static function delete(Request $request) {
        $category = Category::find($request->id);
        $category->delete();
        return true;
    }

    public static function updateStatus(Request $request) {
        $category = Category::find($request->id);
        $category->update([
            "status" => $request->status,
        ]);
        return $category;
    }

    public static function getHomeCategory() {
        $categories = Category::with(['children' => function ($query) {
            $query->with("media")->where([
                ['status', '=', 1],
                ['is_visible_on_home', '=', 1],
            ])->take(3);
        }])->where([
            ['status', '=', 1],
            ['is_visible_on_home', '=', 1],
            ['parent_id', '=', 0],
        ])->take(4)->get();
        return $categories;
    }
}

?>