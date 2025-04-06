<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function home() {
        $catgories = CategoryRepository::getHomeCategory();
        return view("landing.home.index", ['categories' => $catgories]);
    }
}
