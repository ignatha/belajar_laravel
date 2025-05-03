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

Route::get('/','AdminController@index')->name('admin.index');
Route::get('/add','AdminController@add')->name('admin.add');
Route::post('/store','AdminController@store')->name('admin.store');

Route::get('/login','AdminController@login')->name('admin.login');
Route::post('/login_admin','AdminController@login_store')->name('admin.login.store');

Route::get('/logout','AdminController@logout')->name('admin.logout');



