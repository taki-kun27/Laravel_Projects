<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth');
});
Route::resource('products', ProductController::class);

Route::get('/dashboard',[DashboardController::class, 'index'])->name('app');

Route::get('/auth',[AuthController::class, 'viewAuth'])->name('auth.view');
Route::post('/auth', [AuthController::class, 'authenticateUsers'])->name('auth.login');

Route::get('/products', [ProductController::class, 'index']);


Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');