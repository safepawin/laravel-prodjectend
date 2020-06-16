<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view("admin.home");
});

Route::resource('cart', 'CartController')->middleware('auth');
Route::delete('cart/delete/{id}', "CartController@decrease")->middleware('auth');
Route::resource('product', 'ProductController')->middleware('auth');
Route::resource('store', 'StoreController');
