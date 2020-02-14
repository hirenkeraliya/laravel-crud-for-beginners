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

Route::get('/', 'ProductController@index')->name('products.index');
Route::get('/create', 'ProductController@create')->name('products.create');
Route::post('/create', 'ProductController@store');
Route::get('/edit/{product}', 'ProductController@edit')->name('products.edit');
Route::put('/edit/{product}', 'ProductController@update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('product.destroy');
