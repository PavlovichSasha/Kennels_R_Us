<?php

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
    return view('index');
});

Auth::routes();

Route::get('/cart', 'HomeController@index')->name('cart');
Route::get('/about', 'HomeController@index')->name('about');
Route::get('/products', 'HomeController@index')->name('products');
Route::get('/index', 'HomeController@index')->name('home');
?>