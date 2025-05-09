<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\GalleryController;

Route::get('/gallery', [GalleryController::class, 'apiIndex']);
Route::get('/info', [InfoController::class, 'index'])->name('info');
Route::get('/greet', [GreetController::class, 'greet'])->name('greet');

