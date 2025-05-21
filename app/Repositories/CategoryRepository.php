<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository {
    public static function getAll() {
        $categories = Category::with(['children' => function ($query) {
            $query->with("media")->where([
                ['status', '=', 1],
                ['is_visible_on_home', '=', 1],
            ]);
        }])->where([
            ['status', '=', 1],
            ['is_visible_on_home', '=', 1],
            ['parent_id', '=', 0],
        ])->get();
        return $categories;
    }
    public static function list(Request $request) {
        $row_per_page = $request->input("row_per_page", 10);
        $list = Category::with('children')->where('parent_id', 0)->latest()->paginate($row_per_page);
        return $list;
    }

    public static function save(Request $request, MediaRepository $mediaRepo) {
        $data = $request->only(["title", "slug", "parent_id", "icon", "status", "is_visible_on_home"]);
        if ($request->id) {
            $category = Category::find($request->id);
            $category->update($data);

            if ($request->hasFile('icon')) {
                $existingMedia = $category->media()->first();
    
                if ($existingMedia) {
                    $mediaRepo->update($existingMedia, $request->file('icon'), 'category');
                } else {
                    $mediaRepo->create($request->file('icon'), $category, 'category');
                }
            }
        } else {
            $category = Category::create($data);
            $mediaRepo->create($request->file('icon'), $category, "category");
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