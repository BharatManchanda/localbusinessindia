<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
class CategoryController extends Controller
{
    //
    public function view(Request $request) {
        try {
            $categories = CategoryRepository::list($request);
            return view("admin.categories.index", [
                "categories" => $categories
            ]);
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function save() {
        
    }

    public function delete() {
        
    }
}
