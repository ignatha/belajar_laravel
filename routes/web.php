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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', function(){
    return 'Ini halaman Profile';
})->middleware('verified')->name('profile');

Route::get('/category','Frontend\CategoryController@index')->name('category.index');
Route::get('/category/add','Frontend\CategoryController@add')->name('category.add');
Route::post('/category','Frontend\CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}','Frontend\CategoryController@edit')->name('category.edit');
Route::put('/category/update','Frontend\CategoryController@update')->name('category.update');
Route::delete('/category/{id}','Frontend\CategoryController@delete')->name('category.delete');

