<?php

namespace App\Http\Controllers;

use App\Http\Requests\Business\SaveBusinessRequest;
use App\Repositories\{CategoryRepository, BusinessRepository};
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function home() {
        $catgories = CategoryRepository::getHomeCategory();
        return view("landing.home.index", ['categories' => $catgories]);
    }

    public function businessListView(Request $request, $subCategory, $location) {
        $data = $request->all();
        $business = BusinessRepository::getList($data, $subCategory, $location);
        return view("landing.business.list.index", ["businesses" => $business]);
    }

    public function addBusiness() {
        $categories = CategoryRepository::getAllActive();
        return view("landing.business.CreateOrEdit.index", [
            "categories" => $categories
        ]);
    }

    public function saveBusiness(SaveBusinessRequest $request) {
        try {
            $data = $request->all(); // Includes file and all fields
            $business = BusinessRepository::save($data);

            return response()->json([
                'message' => 'Business saved successfully.',
                'data' => $business,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to save business.',
                'errors' => ['general' => $e->getMessage()],
            ], 422);
        }
    }

    public function getBusinessList(Request $request, $subCategory, $location) {
        try {
            $data = $request->all(); // Includes file and all fields
            $business = BusinessRepository::getList($data, $subCategory, $location);

            return response()->json([
                'message' => 'Business list fetched successfully.',
                'data' => $business,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get business list.',
                'errors' => ['general' => $e->getMessage()],
            ], 422);
        }
    }

    public function businessDetail(Request $request, $subCategory, $location, $slug) {
        try {
            $business = BusinessRepository::getDetail($slug);
            return view("landing.business.detail.index", [
                "business" => $business
            ]);
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
