<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/product/{id}', function ($id) {
    return view('index',['data'=>$id]);
});

Route::get('/product/edit/{id}',[\App\Http\Controllers\ProductController::class,'index']);
Route::post('/product/store',[\App\Http\Controllers\ProductController::class,'store']);
