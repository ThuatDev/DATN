<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/main', [MainController::class, 'index'])->name('admin');
    Route::get('admin', [MainController::class, 'index']);

    Route::post('/admin/product/save', [ProductController::class, 'save'])->name('admin.product.save');
    Route::get('/admin/product/main, [ProductController::class, 'index'])->name('admin.product.index');
});
