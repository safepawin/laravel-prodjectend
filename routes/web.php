<?php

use App\Http\Controllers\Api\StoreController;
use App\Store;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view("admin.home");
});

Route::resource('cart', 'CartController')->middleware('auth');
Route::delete('cart/delete/{id}', "CartController@decrease")->middleware('auth');


Route::resource('product', 'ProductController')->middleware('auth');
Route::get('product/create/{id}', 'ProductController@createProduct')->middleware('auth')->name('product.createProduct');


Route::resource('store', 'StoreController');
Route::get('store/profile/{id}', 'StoreController@storeProfile')->name('store.profile')->middleware('auth');
Route::get('store/storeEditProduct/{id}/{pid}', 'StoreController@storeEditProduct')->name('store.EditProduct')->middleware('auth');
Route::post('store/storeEditProduct/{id}/{pid}', 'StoreController@storeEditProductSave')->name('store.EditProductSave')->middleware('auth');
Route::get('store/storeShowAllOrder/{id}','StoreController@storeShowAllOrder')->name('store.ShowAllOrder')->middleware('auth');


Route::get('user/profile', 'UserController@userprofile')->name('user.profile');
Route::put('user/update', 'UserController@userupdate')->name('user.update');
Route::delete('user/delete/{id}', 'UserController@userdelete')->name('user.delete');
Route::get('user/userOrder','UserController@userOrder')->name('user.order');
Route::get('user/orderdetail/{id}','UserController@orderDetail')->name('user.orderdetail');


Route::resource('checkout', 'CheckoutController');
