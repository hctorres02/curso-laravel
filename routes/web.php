<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', Admin\HomeController::class)->name('admin.home');
});

Route::prefix('/{category:slug}')->group(function () {
    Route::get('/', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/{post:slug}', [BlogController::class, 'post'])->name('blog.post')->scopeBindings();
});
