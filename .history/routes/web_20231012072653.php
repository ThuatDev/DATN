<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Maincontroller;

// Route::get('admin/users/login', 'Admin\Users\LoginController@index');

Route::get ('admin/users/login', [LoginController::class,'index'] )->name('login');
Route::post('/admin/users/login/store', [LoginController::class,'store'] );
// Route::get('/admin/main', [Maincontroller::class,'index'] )->name('admin')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/main', [Maincontroller::class,'index'] )->name('admin');
    Route::get ('admin',[Maincontroller::class,'index'] )
});
