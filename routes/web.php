<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Home')->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', fn () => 'Admin home')->name('admin.home');
});

Route::prefix('/{category:slug}')->group(function () {
    Route::get('/', fn (Category $category) => $category)->name('blog.category');
    Route::get('/{post:slug}', fn (Category $category, Post $post) => "{$category}: {$post}")->name('blog.post')->scopeBindings();
});
