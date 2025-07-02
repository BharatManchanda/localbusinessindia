<?php

namespace App\Repositories;

use App\Models\{Business, Category};
use Illuminate\Http\Request;

class BusinessRepository
{
    /**
     * Store a new business record.
     */
    public static function save(array $data): Business {
        $data['address'] = $data['business_address'] ?? null;

        if ($data['id'] && $data['id'] != null && $data['id'] != 'null') {
            $business = Business::find($data['id']);
            $business->update($data);

            if (isset($data['business_logo']) && $data['business_logo']->isValid()) {
                $existingMedia = $business->media()->first();
                if ($existingMedia) {
                    MediaRepository::update($existingMedia, $data['business_logo'], 'business_logo');
                } else {
                    MediaRepository::create($data['business_logo'], $business, 'business_logo');
                }
            }
        } else {
            $business = Business::create($data);

            if (isset($data['business_logo']) && $data['business_logo']->isValid()) {
                MediaRepository::create($data['business_logo'], $business, 'business_logo');
            }
        }

        return $business;
    }

    public static function getList($data, $subCategory, $location) {
        $subCategoryIds = Category::where("slug", $subCategory)->pluck("id");
        $business = Business::with("media")
            ->whereIn("sub_category_id", $subCategoryIds)
            ->where("city", $location)
            ->where("status", 1)
            ->paginate($data['rowPerPage'] ?? 10);
        return $business;
    }
    
    public static function getDetail($slug) {
        $business = Business::with("media")
            ->where("slug", $slug)
            ->first();
        return $business;
    }

    public static function list($data) {
        $row_per_page = $data['row_per_page'] ?? 10;
        $list = Business::with("subCategory")
            ->latest()
            ->paginate($row_per_page);
        return $list;
    }

    public static function delete(Request $request) {
        $category = Business::find($request->id);
        $category->delete();
        return true;
    }

    public static function updateStatus($data) {
        $business = Business::find($data['id']);
        $business->update([
            "status" => $data['status'],
        ]);
        return $business;
    }
}
