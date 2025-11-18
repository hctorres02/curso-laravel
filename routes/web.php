<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Home')->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', fn () => 'Admin home')->name('admin.home');
});

Route::prefix('/{category:slug}')->group(function () {
    Route::get('/', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/{post:slug}', [BlogController::class, 'post'])->name('blog.post')->scopeBindings();
});
