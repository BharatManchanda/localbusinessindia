<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateOrEditRequest;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\MediaRepository;

class CategoryController extends Controller
{
    //
    public function view(Request $request) {
        try {
            return view("admin.categories.index", []);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }
    public function list(Request $request) {
        try {
            $list = CategoryRepository::list($request);
            return $this->json("Fetch categories successfully.", [
                "categories" => $list,
            ]);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }

    }

    public function save(CreateOrEditRequest $request, MediaRepository $mediaRepo) {
        try {
            $category = CategoryRepository::save($request, $mediaRepo);
            return $this->json("Category saved successfully.", [
                "category" => $category,
            ]);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }

    public function delete(Request $request) {
        try {
            CategoryRepository::delete($request);
            return $this->json("Category delete successfully.", []);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }

    public function updateStatus(Request $request) {
        try {
            $category = CategoryRepository::updateStatus($request);
            return $this->json("Category status updated successfully.", [
                "category" => $category,
            ]);
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), [], 422);
        }
    }
}
