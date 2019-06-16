<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Admin')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@Login');

    Route::post('logout','LoginController@logout')->name('admin.logout');
    
    Route::middleware('auth:admin')->group(function(){
        Route::get('/', 'IndexController@index')->name('admin');
        Route::resource('/product', 'ProductController');
        Route::resource('/member', 'MemberController');
        Route::resource('/discount', 'DiscountController');
        Route::resource('/order', 'OrderController');
    });
});

