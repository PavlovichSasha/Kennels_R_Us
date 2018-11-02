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

Route::get('/index', 'HomeController@index')->name('index');
Route::post('/products', 'productsController@AddToCart')->name('addToCart');

Route::get('/products', function(){
return view('products');
})->name('products');

Route::get('/cart', function(){
return view('cart');
})->name('cart');

Route::get('/about', function(){
return view('about');
})->name('about');
?>