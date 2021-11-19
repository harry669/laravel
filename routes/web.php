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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product', 'ProductController@index')->name('product');

Route::get('/image-upload','ImageController@ImageUpload')->name('image-upload');

Route::post('/image-store','ImageController@ImageStore')->name('image-store');

Route::get('/cart-add','CartController@test')->name('cart');