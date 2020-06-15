<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('fliter', 'Api\FilterController');
Route::resource('category', 'Api\CategoryController');
Route::resource('product', 'Api\ProductController');
Route::get('product/search/{name}', 'Api\ProductController@searchProduct')->name('product.search');
Route::get('fliter/{sort}/{id?}', 'Api\FilterController@sortProducts')->name('filter.sort');
