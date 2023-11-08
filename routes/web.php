<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', FrontendController::class);
Route::get('article/{slug}',[FrontendController::class,'detail'])->name('article.detail');
Route::get('categories/{name}',[FrontendController::class,'get_data_by_category'])->name('getByCategory');
Route::get('categories/sub_categories/{name}',[FrontendController::class,'get_data_by_sub_category'])->name('getBySubCategory');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    // Cateories
    Route::resource('categories', CategoryController::class);
    Route::post('categories/change-status', [CategoryController::class, 'changeStatus'])->name('categories.change-status');
    // SubCategory
    Route::resource('subCategory', SubCategoryController::class);
    Route::post('subCategory/change-status',[SubCategoryController::class,'changeStatus'])->name('subCategory.changeStatus');

    // Articles
    Route::resource('articles', ArticleController::class);
    Route::get('getSubCategory',[ArticleController::class,'getSubCategory']);
    Route::post('articles/change-status',[ArticleController::class,'changeStatus'])->name('articles.changeStatus');

});

Auth::routes();

