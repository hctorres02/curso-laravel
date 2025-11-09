<?php

use App\Models\Category;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET admin.categories.index', function () {
    $uri = route('admin.categories.index');
    $response = get($uri);

    $response->assertOk();
});

test('GET admin.categories.create', function () {
    $uri = route('admin.categories.create');
    $response = get($uri);

    $response->assertOk();
});

test('POST admin.categories.store', function () {
    //
});

test('GET admin.categories.show', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.show', $category);
    $response = get($uri);

    $response->assertRedirectToRoute('blog.category', $category);
});

test('GET admin.categories.edit', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.edit', $category);
    $response = get($uri);

    $response->assertOk();
});

test('PUT admin.categories.update', function () {
    //
});

test('DELETE admin.categories.destroy', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.destroy', $category);
    $response = delete($uri);

    $response->assertRedirectToRoute('admin.categories.edit', $category);
});

test('POST admin.categories.restore', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.restore', $category);
    $response = post($uri);

    $response->assertRedirectToRoute('admin.categories.edit', $category);
});

test('DELETE admin.categories.force_destroy', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.force_destroy', $category);
    $response = delete($uri);

    $response->assertRedirectToRoute('admin.categories.index');
});
