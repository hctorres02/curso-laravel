<?php

use App\Models\Category;
use App\Models\Post;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.posts.index', function () {
    $uri = route('admin.posts.index');
    $response = get($uri);

    $response->assertOk();
});

test('GET admin.posts.create', function () {
    $uri = route('admin.posts.create');
    $response = get($uri);

    $response->assertOk();
});

test('POST admin.posts.preview', function () {
    $uri = route('admin.posts.preview');
    $response = post($uri);

    $response->assertOk();
});

test('POST admin.posts.store', function () {
    //
});

test('GET admin.posts.show', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->for($category)->create();
    $uri = route('admin.posts.show', $post);
    $response = get($uri);

    $response->assertRedirectToRoute('blog.post', [$category, $post]);
});

test('GET admin.posts.edit', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.edit', $post);
    $response = get($uri);

    $response->assertOk();
});

test('PUT admin.posts.update', function () {
    //
});

test('DELETE admin.posts.destroy', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.destroy', $post);
    $response = delete($uri);

    $response->assertRedirectToRoute('admin.posts.edit', $post);
});

test('POST admin.posts.restore', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.restore', $post);
    $response = post($uri);

    $response->assertRedirectToRoute('admin.posts.edit', $post);
});

test('DELETE admin.posts.force_destroy', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.force_destroy', $post);
    $response = delete($uri);

    $response->assertRedirectToRoute('admin.posts.index');
});
