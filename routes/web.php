<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'oke';
});

Route::get('/user','UserController@index');
Route::get('/db','UserController@db');

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/detail/{id}','ProductController@detail')->name('product.detail');

Route::get('/product/add','ProductController@add')->name('product.add');
Route::post('/product','ProductController@store')->name('product.store');

Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');
Route::put('/product/edit/{id}','ProductController@update')->name('product.update');

Route::delete('/product/{id}','ProductController@delete')->name('product.delete');

