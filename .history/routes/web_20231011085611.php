<?php

use Illuminate\Support\Facades\Route;

Route::get ('admin/users/login', 'Admin\Users\LoginController@index')->name('admin.users.login');