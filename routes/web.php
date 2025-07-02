<?php

use App\Http\Controllers\{
    LandingController,
    CategoryController,
    BusinessController,
};
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    DashboardController,
};
use App\Http\Controllers\Auth\AuthSessionController;

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

Route::prefix("/auth")->name('auth.')->group(function() {
    Route::post("login", [AuthSessionController::class, 'login'])->name('login');
    Route::get("logout", [AuthSessionController::class, 'logout'])->name('logout');
});

Route::name('landing.')->group(function() {
    Route::get('/', [LandingController::class, 'home'])->name("home");

    // Business
    Route::name('business.')->prefix('/business')->group(function() {
        Route::get("/add", [LandingController::class, 'addBusiness'])->name("add");
        Route::post("/save", [LandingController::class, 'saveBusiness'])->name("save");
    });
});

Route::middleware(['auth'])->name('admin.')->prefix('/admin')->group(function() {

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
    
    Route::name('business.')->prefix('/business')->group(function() {
        Route::get("/", [BusinessController::class, 'view'])->name("view");
        Route::post("/get-list", [BusinessController::class, 'list'])->name("list");
        Route::post("/delete", [BusinessController::class, 'delete'])->name("delete");
        Route::post("/update-status", [BusinessController::class, 'updateStatus'])->name("update.status");
    });
});

Route::name('landing.')->group(function() {
    Route::get("/{subCategory}/{location}", [LandingController::class, 'businessListView'])->name("business.get.list");
    Route::get("/{slug}", [LandingController::class, 'businessDetail'])->name("business.get.detail");
});
