<?php

use App\Http\Controllers\reportsController;

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

Route::post('/products', 'productsController@addToCart')->name('addToCart');

Route::post('/update', 'productsController@updateCart')->name('updateCart');

Route::post('/remove', 'productsController@removeFromCart')->name('removeFromCart');

Route::post('/checkoutComplete', 'productsController@checkoutComplete')->name('checkoutComplete');

Route::post('/customAdd', 'productsController@customAddCart')->name('customAddCart');

Route::get('/products', function(){
return view('products');
})->name('products');

Route::get('/checkout', function(){
    return view('checkout');
    })->name('checkout');

Route::get('/custom', function(){
return view('custom');
})->name('custom');

Route::get('/cart', function(){
return view('cart');
})->name('cart');

Route::get('/about', function(){
return view('about');
})->name('about');


Route::get('/reports', function(){
    return view('reports');
    })->name('reports');

Route::get('/reports', 'reportsController@reportsTables')->name('reports');
?>