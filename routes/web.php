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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->get('add-to-cart/{product}', 'CartController@add')->name('cart.add');
Route::middleware('auth')->get('/cart', 'CartController@index')->name('cart.index');
Route::middleware('auth')->get('/cart/delete/{itemid}', 'CartController@destroy')->name('cart.destroy');
Route::middleware('auth')->get('/cart/update/{itemid}', 'CartController@update')->name('cart.update');
Route::middleware('auth')->get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
