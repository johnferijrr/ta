<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SendEmailController;

Route::get('/', function () {
    return view('auth.login'); // Welcome page route
})->name(name: 'auth.login');

Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])
    ->middleware(CheckAge::class)
    ->name('dashboard');
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class);

Route::resource('gallery', GalleryController::class);

Route::get('/cpa', function () {
    return view('auth.login'); // Welcome page route
})->name(name: 'auth.login');

Route::get('/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

