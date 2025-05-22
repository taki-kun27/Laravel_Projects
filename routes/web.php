<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return view('auth');
});
Route::resource('products', ProductController::class);

Route::get('/dashboard',[ProductController::class, 'index'])->name('app');

Route::get('/auth',[AuthController::class, 'viewAuth'])->name('auth.view');
Route::post('/auth', [AuthController::class, 'authenticateUsers'])->name('auth.login');


Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//Upload File Routes

Route::get('/upload', [FileUploadController::class, 'showFileUpload'])->name('upload.create');
Route::post('/upload', [FileUploadController::class, 'storeFile'])->name('upload.file');