<?php

use App\Http\Controllers\{
    LandingController,
    CategoryController
};
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    DashboardController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'home']);

Route::name('admin.')->prefix('/admin')->group(function() {

    Route::name('dashboard.')->prefix('/dashboard')->group(function() {
        Route::get("/", [DashboardController::class, 'view'])->name("view");
    });

    Route::name('category.')->prefix('/category')->group(function() {
        Route::get("/", [CategoryController::class, 'view'])->name("view");
        Route::post("/list", [CategoryController::class, 'list'])->name("list");
        Route::post("/save", [CategoryController::class, 'save'])->name("save");
        Route::post("/delete", [CategoryController::class, 'delete'])->name("delete");
        Route::post("/update-status", [CategoryController::class, 'updateStatus'])->name("update.status");
    });

});
