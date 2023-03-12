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


Route::get('/', 'App\Http\Controllers\ListProductController')->name('products.index');
Route::get('/pay', 'App\Http\Controllers\PayController')->name('cart.pay');
Route::get('cart/delete/{id}', 'App\Http\Controllers\DeleteItemController')->name('cart.remove');
Route::put('cart/remove', 'App\Http\Controllers\RemoveItemController')->name('cart.updabyproduct');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController')->name('cart.checkout');
Route::post('cart/add', 'App\Http\Controllers\AddItemController')->name('cart.add');
