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

Route::get('/category','Frontend\CategoryController@index')->name('category.index');
Route::get('/category/add','Frontend\CategoryController@add')->name('category.add');
Route::post('/category','Frontend\CategoryController@store')->name('category.store');
Route::get('/category/edit/{id}','Frontend\CategoryController@edit')->name('category.edit');
Route::put('/category/update','Frontend\CategoryController@update')->name('category.update');
Route::delete('/category/{id}','Frontend\CategoryController@delete')->name('category.delete');


Auth::routes();
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify', function () {

    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $r) {
    $r->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

use Illuminate\Http\Request;

Route::post('/email/verification-notification', function (Request $r) {

    $r->user()->sendEmailVerificationNotification();

    return back()->with('resent', 'Verification link sent ');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
