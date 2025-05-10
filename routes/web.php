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

Route::get('/','HomeController@index')->middleware(['auth'])->name('home');

Route::get('/user','UserController@index');
Route::get('/db','UserController@db');

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/fetch','ProductController@fetch')->name('product.fetch');
Route::get('/product/detail/{id}','ProductController@detail')->name('product.detail');
Route::get('/product/add','ProductController@add')->name('product.add');
Route::post('/product','ProductController@store')->name('product.store');
Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');
Route::put('/product/edit/{id}','ProductController@update')->name('product.update');
Route::delete('/product/{id}','ProductController@delete')->name('product.delete');

Route::get('/product/session','ProductController@session')->name('product.session');

//halaman login
Route::get('/login','AuthController@login')->middleware(['guest'])->name('login');
Route::post('/login','AuthController@login_store')->middleware(['guest'])->name('login.store');

Route::get('/register','AuthController@register')->middleware(['guest'])->name('register');
Route::post('/register','AuthController@register_store')->middleware(['guest'])->name('register.store');

Route::post('/logout','AuthController@logout')->name('logout');

Route::get('/verif_email/{token}','AuthController@verif_email')->name('verif.email');

