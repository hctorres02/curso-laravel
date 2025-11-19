<?php

use App\Models\Category;
use App\Models\Post;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.posts.index', function () {
    $route = route('admin.posts.index');

    get($route)
        ->assertOk();
});

test('GET admin.posts.create', function () {
    $route = route('admin.posts.create');

    get($route)
        ->assertOk();
});

test('POST admin.posts.preview', function () {
    $route = route('admin.posts.preview');

    post($route)
        ->assertOk();
});

test('POST admin.posts.store', function () {
    //
});

test('GET admin.posts.show', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->for($category)->create();
    $route = route('admin.posts.show', $post);

    get($route)
        ->assertRedirectToRoute('blog.post', [$category, $post]);
});

test('GET admin.posts.edit', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.edit', $post);

    get($route)
        ->assertOk();
});

test('PUT admin.posts.update', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.update', $post);

    put($route)
        ->assertRedirectBack();
});

test('DELETE admin.posts.destroy', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.destroy', $post);

    delete($route)
        ->assertRedirectBack();
});

test('POST admin.posts.restore', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.restore', $post);

    post($route)
        ->assertRedirectBack();
});

test('DELETE admin.posts.force_destroy', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.force_destroy', $post);

    delete($route)
        ->assertRedirectToRoute('admin.posts.index');
});
