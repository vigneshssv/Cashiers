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

Route::get('/', function () {
    return redirect('/login');
    // return view('welcome');
});

Auth::routes();
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::group(['prefix' => '', 'middleware' => ['auth']], function() {
Route::get('home', [App\Http\Controllers\ProductsController::class, 'index'])->name('home');
Route::get('product-details/{id?}', 'App\Http\Controllers\ProductsController@product_details');
Route::post('purchase', 'App\Http\Controllers\ProductsController@purchase');
Route::post('validate-purchase-form', 'App\Http\Controllers\ProductsController@validate_purchase_form');
});
