<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllersms;

Route::get('/send-sms-form', function() {
    return view('send_sms');
});

Route::post('/send-sms', [AuthControllersms::class, 'sendSms']);

// Auth routes (no changes needed)
Auth::routes();
Route::get('active/{token}', 'Auth\RegisterController@activation')->name('active_account');


// Admin routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

    // Users
    Route::get('users', 'Admin\UserController@index')->name('users');
    Route::post('user/new', 'Admin\UserController@new')->name('user_new');
    Route::post('user/delete', 'Admin\UserController@delete')->name('user_delete');
    Route::get('user/{id}/show', 'Admin\UserController@show')->name('user_show');
    Route::get('user/{id}/send', 'Admin\UserController@send')->name('user_send');

    // Posts
    Route::get('posts', 'Admin\PostController@index')->name('post.index');
    Route::get('post/new', 'Admin\PostController@new')->name('post.new');
    Route::post('post/save', 'Admin\PostController@save')->name('post.save');
    Route::post('post/delete', 'Admin\PostController@delete')->name('post.delete');
    Route::get('post/{id}/edit', 'Admin\PostController@edit')->name('post.edit');
    Route::post('post/{id}/update', 'Admin\PostController@update')->name('post.update');

    // Advertises
    Route::get('advertises', 'Admin\AdvertiseController@index')->name('advertise.index');
    Route::get('advertise/new', 'Admin\AdvertiseController@new')->name('advertise.new');
    Route::post('advertise/save', 'Admin\AdvertiseController@save')->name('advertise.save');
    Route::post('advertise/delete', 'Admin\AdvertiseController@delete')->name('advertise.delete');
    Route::get('advertise/{id}/edit', 'Admin\AdvertiseController@edit')->name('advertise.edit');
    Route::post('advertise/{id}/update', 'Admin\AdvertiseController@update')->name('advertise.update');

    // Products
    Route::get('products', 'Admin\ProductController@index')->name('product.index');
 Route::post('product/save-flash-sale', 'Admin\ProductController@saveFlashSale')->name('product.save_flash_sale');

Route::get('product/new', 'Admin\ProductController@new')->name('product.new');

    Route::post('product/save', 'Admin\ProductController@save')->name('product.save');
    Route::post('product/delete', 'Admin\ProductController@delete')->name('product.delete');
    Route::get('product/{id}/edit', 'Admin\ProductController@edit')->name('product.edit');
    Route::post('product/{id}/update', 'Admin\ProductController@update')->name('product.update');
    Route::post('promotion/delete', 'Admin\ProductController@delete_promotion')->name('product.delete_promotion');
    Route::post('product_detail/delete', 'Admin\ProductController@delete_product_detail')->name('product.delete_product_detail');
    Route::post('product/image/delete', 'Admin\ProductController@delete_image')->name('product.delete_image');
    // khai báo 3 router này
        // @include('admin.product.create_phone')
        //             @elseif($selectedType == 'watch')
        //                 @include('admin.product.create_watch')
        //             @elseif($selectedType == 'accessory')
        //                 @include('admin.product.create_accessory')
    // trong file create.blade.php
    Route::get('product/create_phone', 'Admin\ProductController@create_phone')->name('product.create_phone');
    Route::get('product/create_watch', 'Admin\ProductController@create_watch')->name('product.create_watch');
    Route::get('product/create_accessory', 'Admin\ProductController@create_accessory')->name('product.create_accessory');
    // Orders
    Route::get('orders', 'Admin\OrderController@index')->name('order.index');
    Route::get('order/{id}/show', 'Admin\OrderController@show')->name('order.show');

    // Statistic
    Route::get('statistic', 'Admin\StatisticController@index')->name('statistic');
    Route::post('statistic/change', 'Admin\StatisticController@edit')->name('statistic.edit');
});
Route::get('/storage-link', function() {
    $targetFolder = storage_path('app/public'); // Chú ý đến tên biến
    $linkFolder = public_path('storage'); // Sử dụng public_path() thay vì $_SERVER['DOCUMENT_ROOT']
    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return 'Symlink created successfully';
    }

    return 'Symlink already exists';
});
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Cache cleared';
});

Route::get('/clear-route', function() {
    Artisan::call('route:clear');
    return 'Route cache cleared';
});

Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return 'Config cache cleared';
});

Route::get('/clear-view', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
});

// Page routes
Route::namespace('Pages')->group(function () {
    // Home Page
    Route::get('/', 'HomePage')->name('home_page');

    // About Page
    Route::get('about', 'AboutPage')->name('about_page');

    // Contact Page
    Route::get('contact', 'ContactPage')->name('contact_page');

    // Search Page
    Route::get('search', 'SearchController')->name('search');

    // Posts Page
    Route::get('posts', 'PostController@index')->name('posts_page');
    Route::get('post/{id}', 'PostController@show')->name('post_page');

    // Orders Page
    Route::get('orders', 'OrderController@index')->name('orders_page');
    Route::get('order/{id}', 'OrderController@show')->name('order_page');

    // User Routes
    Route::get('user/profile', 'UserController@show')->name('show_user');
    Route::get('user/edit', 'UserController@edit')->name('edit_user');
    Route::post('user/save', 'UserController@save')->name('save_user');

    // Product Pages
    Route::get('products', 'ProductsController@index')->name('products_page');
    Route::get('producer/{id}', 'ProductsController@getProducer')->name('producer_page');
    Route::get('product/{id}', 'ProductsController@getProduct')->name('product_page');
    Route::post('vote', 'ProductsController@addVote')->name('add_vote');
    Route::post('cart/add', 'CartController@addCart')->name('add_cart');
    Route::post('cart/remove', 'CartController@removeCart')->name('remove_cart');
    Route::post('minicart/update', 'CartController@updateMiniCart')->name('update_minicart');
    Route::post('cart/update', 'CartController@updateCart')->name('update_cart');
    Route::get('cart', 'CartController@showCart')->name('show_cart');
    Route::post('checkout', 'CartController@showCheckout')->name('show_checkout');
    Route::post('payment', 'CartController@payment')->name('payment');
    Route::get('payment/response', 'CartController@responsePayment')->name('payment_response');
});
