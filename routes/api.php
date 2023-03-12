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


Route::get('/', 'App\Http\Controllers\Api\ListProductApiController')->name('products.api');
Route::get('/pay', 'App\Http\Controllers\Api\PayApiController')->name('api.pay');
Route::get('cart/delete/{id}', 'App\Http\Controllers\Api\DeleteItemApiController')->name('api.remove');
Route::put('cart/remove', 'App\Http\Controllers\Api\RemoveItemApiController')->name('api.updabyproduct');
Route::get('/checkout', 'App\Http\Controllers\Api\CheckoutApiController')->name('api.checkout');
Route::post('cart/add', 'App\Http\Controllers\Api\AddItemApiController')->name('api.add');
