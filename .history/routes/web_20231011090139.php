<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
// Route::get('admin/users/login', 'Admin\Users\LoginController@index');

Route::get ('admin/users/login', [LoginController::class,'index'] );