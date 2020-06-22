<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//filters
Route::resource('storefilter', 'Api\StoreFilterController');
Route::resource('productfilter', 'Api\ProductFilterController');
Route::get('productfliter/{sort}/{id?}', 'Api\ProductFilterController@sortProducts')->name('filter.sort');
//category
Route::resource('category', 'Api\CategoryController');
//products
Route::resource('product', 'Api\ProductController');
Route::get('product/search/{name}', 'Api\ProductController@searchProduct')->name('product.search');
Route::get('product/productimage/{id}','Api\ProductController@getProductImage')->name('product.getImage');
//cart
//stores
Route::resource('store', 'Api\StoreController');
Route::get('store/search/{name}', 'Api\StoreController@searchStore')->name('store.search');
