<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', Admin\HomeController::class)->name('admin.home');

    Route::prefix('/categories')->group(function () {
        Route::post('/{category}/restore', [Admin\CategoryController::class, 'restore'])->name('admin.categories.restore');
        Route::delete('/{category}/force-destroy', [Admin\CategoryController::class, 'forceDestroy'])->name('admin.categories.force_destroy');
    });

    Route::prefix('/comments')->group(function () {
        Route::post('/{comment}/approve', [Admin\CommentController::class, 'approve'])->name('admin.comments.approve');
    });

    Route::prefix('/posts')->group(function () {
        Route::post('/preview', [Admin\PostController::class, 'preview'])->name('admin.posts.preview');
        Route::post('/{post}/restore', [Admin\PostController::class, 'restore'])->name('admin.posts.restore');
        Route::delete('/{post}/force-destroy', [Admin\PostController::class, 'forceDestroy'])->name('admin.posts.force_destroy');
    });

    Route::prefix('/users')->group(function () {
        Route::post('/{user}/restore', [Admin\UserController::class, 'restore'])->name('admin.users.restore');
        Route::delete('/{user}/force-destroy', [Admin\UserController::class, 'forceDestroy'])->name('admin.users.force_destroy');
    });

    Route::resource('/categories', Admin\CategoryController::class)->names('admin.categories');

    Route::resource('/comments', Admin\CommentController::class)->names('admin.comments')->only('index', 'destroy');

    Route::resource('/medias', Admin\MediaController::class)->names('admin.medias');

    Route::resource('/posts', Admin\PostController::class)->names('admin.posts');

    Route::resource('/users', Admin\UserController::class)->names('admin.users');
});

Route::resource('/comments', CommentController::class)->names('comments')->only('index', 'store', 'destroy');

Route::prefix('/{category:slug}')->group(function () {
    Route::get('/', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/{post:slug}', [BlogController::class, 'post'])->name('blog.post')->scopeBindings();
});
