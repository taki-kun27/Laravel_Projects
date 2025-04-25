<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);


Route::get('/auth',[AuthController::class, 'viewAuth']);