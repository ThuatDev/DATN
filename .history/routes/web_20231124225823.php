<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
Auth::routes();
Route::get('active/{token}', 'Auth\RegisterController@activation')->name('active_account');


Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('products', 'Admin\ProductController@index')->name('product.index');
    Route::get('product/new', 'Admin\ProductController@new')->name('product.new');
    Route::post('product/save', 'Admin\ProductController@save')->name('product.save');
    Route::post('product/delete', 'Admin\ProductController@delete')->name('product.delete');
    Route::get('product/{id}/edit', 'Admin\ProductController@edit')->name('product.edit');
    Route::post('product/{id}/update', 'Admin\ProductController@update')->name('product.update');
    Route::post('promotion/delete', 'Admin\ProductController@delete_promotion')->name('product.delete_promotion');
    Route::post('product_detail/delete', 'Admin\ProductController@delete_product_detail')->name('product.delete_product_detail');
    Route::post('product/image/delete', 'Admin\ProductController@delete_image')->name('product.delete_image');

    // Orders

});
