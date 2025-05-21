<?php

namespace App\Http\Controllers;

use App\Http\Requests\Business\SaveBusinessRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function home() {
        $catgories = CategoryRepository::getHomeCategory();
        return view("landing.home.index", ['categories' => $catgories]);
    }


    public function addBusiness() {
        $categories = CategoryRepository::getAll();
        return view("landing.business.CreateOrEdit.index", [
            "categories" => $categories
        ]);
    }

    public function saveBusiness(SaveBusinessRequest $request) {
        dd($request->all());
    }
}
