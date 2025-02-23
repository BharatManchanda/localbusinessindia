<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository {
    public static function list(Request $request) {
        $row_per_page = $request->input("row_per_page", 10);
        $list = Category::with('children')->where('parent_id', 0)->latest()->paginate($row_per_page);
        return $list;
    }

    public static function save(Request $request) {
        $data = $request->only(["title", "slug", "parent_id", "icon", "status", "is_visible_on_home"]);
        if ($request->id) {
            $category = Category::find($request->id);
            $category->update($data);
        } else {
            $category = Category::create($data);
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
}

?>