<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', Admin\HomeController::class)->name('admin.home');

    Route::resource('/categories', Admin\CategoryController::class)->names('admin.categories');

    Route::resource('/medias', Admin\MediaController::class)->names('admin.medias');

    Route::resource('/posts', Admin\PostController::class)->names('admin.posts');

    Route::resource('/users', Admin\UserController::class)->names('admin.users');
});

Route::prefix('/{category:slug}')->group(function () {
    Route::get('/', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/{post:slug}', [BlogController::class, 'post'])->name('blog.post')->scopeBindings();
});
