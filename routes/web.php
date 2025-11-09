<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Home')->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/', fn () => 'Admin home')->name('admin.home');
});

Route::prefix('/{category}')->group(function () {
    Route::get('/', fn ($category) => $category)->name('blog.category');
    Route::get('/{post}', fn ($category, $post) => "{$category}: {$post}")->name('blog.post');
});
