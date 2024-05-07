<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::group([
    'prefix' => '/auth',
    'controller' => AuthController::class,
], function () {
    Route::any('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware([role::class])->group(function () {
    Route::group([
        'prefix' => '/post',
        'controller' => PostController::class,
    ], function () {
        Route::any('/', 'post')->name('post');
    });
});

Route::middleware([role::class])->group(function(){
    Route::group([
        'prefix' => '/account',
        'controller' => AccountController::class,
    ], function () {
        Route::any('/', 'account')->name('account');
    });
});