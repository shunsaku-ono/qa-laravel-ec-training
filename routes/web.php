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

// Authのルーティング
Auth::routes();

// topへの画面遷移
Route::get('/', function () {
    return view('top');
});

Route::get('/products', 'ProductsController@index');
Route::get('/search', 'ProductsController@search')->name('product.search');
