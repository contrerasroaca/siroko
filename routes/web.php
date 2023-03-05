<?php

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


Route::post('cart/add', 'App\Http\Controllers\CartController@addItem')->name('cart.add');
Route::get('cart/remove/{id}', 'App\Http\Controllers\CartController@removeItem')->name('cart.remove');
Route::get('/checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');
Route::get('/pay', 'App\Http\Controllers\CartController@pay')->name('cart.pay');
Route::put('cart/updatequantity', 'App\Http\Controllers\CartController@updateQuantityByProduct')->name('cart.updabyproduct');
Route::get('/', 'App\Http\Controllers\ProductController@index')->name('products.index');
