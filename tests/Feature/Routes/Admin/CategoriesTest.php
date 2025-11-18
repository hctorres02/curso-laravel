<?php

use App\Models\Category;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.categories.index', function () {
    $route = route('admin.categories.index');

    get($route)
        ->assertOk();
});

test('GET admin.categories.create', function () {
    $route = route('admin.categories.create');

    get($route)
        ->assertOk();
});

test('POST admin.categories.store', function () {
    //
});

test('GET admin.categories.show', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.show', $category);

    get($route)
        ->assertRedirectToRoute('blog.category', $category);
});

test('GET admin.categories.edit', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.edit', $category);

    get($route)
        ->assertOk();
});

test('PUT admin.categories.update', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.update', $category);

    put($route)
        ->assertRedirectBack();
});

test('DELETE admin.categories.destroy', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.destroy', $category);

    delete($route)
        ->assertRedirectBack();
});

test('POST admin.categories.restore', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.restore', $category);

    post($route)
        ->assertRedirectBack();
});

test('DELETE admin.categories.force_destroy', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.force_destroy', $category);

    delete($route)
        ->assertRedirectToRoute('admin.categories.index');
});
