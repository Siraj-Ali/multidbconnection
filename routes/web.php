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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('locale/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create/product', 'Product\ProductController@create')->name('create.product');
Route::get('/add/product/{product}/{con}', 'Product\ProductController@edit')->name('edit.product');
Route::post('/update/product', 'Product\ProductController@update')->name('update.product');
Route::post('/create/product', 'Product\ProductController@storeProduct')->name('store.product');
Route::get('/destroye/product/{product}/{con}', 'Product\ProductController@destroye')->name('destroye.product');
