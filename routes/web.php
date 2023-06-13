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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product', 'App\Http\Controllers\ProductController@productList');
Route::get('/product/create', 'App\Http\Controllers\ProductController@productCreate');
Route::post('/product/save', 'App\Http\Controllers\ProductController@productSave');
Route::get('/product/edit/{product}', 'App\Http\Controllers\ProductController@productEdit');
Route::post('/product/update/{product}', 'App\Http\Controllers\ProductController@productUpdate');
Route::get('/product/delete/{product}', 'App\Http\Controllers\ProductController@productDelete');

