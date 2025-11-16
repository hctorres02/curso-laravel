<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Home')->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', fn () => 'Admin home')->name('admin.home');
});
