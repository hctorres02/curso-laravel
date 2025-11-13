<?php

use App\Models\Category;
use App\Models\Post;

use App\Models\User;
use function Pest\Laravel\actingAs;

test('GET admin.posts.index', function () {
    $uri = route('admin.posts.index');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.posts.index');
});

test('GET admin.posts.create', function () {
    $uri = route('admin.posts.create');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.posts.create');
});

test('POST admin.posts.preview', function () {
    $uri = route('admin.posts.preview');
    $admin = User::factory()->create();
    $response = actingAs($admin)->post($uri);

    $response->assertOk();
});

test('POST admin.posts.store', function () {
    //
});

test('GET admin.posts.show', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->for($category)->create();
    $uri = route('admin.posts.show', $post);
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertRedirectToRoute('blog.post', [$category, $post]);
});

test('GET admin.posts.edit', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.edit', $post);
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.posts.edit');
});

test('PUT admin.posts.update', function () {
    //
});

test('DELETE admin.posts.destroy', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.destroy', $post);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertRedirectToRoute('admin.posts.edit', $post);
});

test('POST admin.posts.restore', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.restore', $post);
    $admin = User::factory()->create();
    $response = actingAs($admin)->post($uri);

    $response->assertRedirectToRoute('admin.posts.edit', $post);
});

test('DELETE admin.posts.force_destroy', function () {
    $post = Post::factory()->create();
    $uri = route('admin.posts.force_destroy', $post);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertRedirectToRoute('admin.posts.index');
});
