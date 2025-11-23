<?php

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.posts.index', function () {
    $route = route('admin.posts.index');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get(route('admin.posts.index', [
            'category_id' => 'not-exists',
            'status' => 'not-exists',
        ]))
        ->assertSessionHasErrors(['category_id', 'status']);

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.posts.index')
        ->assertViewHasAll([
            'categories',
            'searchParams',
            'statuses',
        ])
        ->assertOk();
});

test('GET admin.posts.create', function () {
    $route = route('admin.posts.create');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.posts.create')
        ->assertViewHasAll([
            'categories',
            'statuses',
        ])
        ->assertOk();
});

test('POST admin.posts.preview', function () {
    $route = route('admin.posts.preview');
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route)
        ->assertOk();
});

test('POST admin.posts.store', function () {
    $route = route('admin.posts.store');
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route, [
            'title' => '',
            'body' => '<h1>Unsafe markdown</h1>',
            'slug' => Post::factory()->create()->slug,
            'category_id' => 'not-exists',
            'status' => 'not-exists',
        ])
        ->assertInvalid(['title', 'body', 'slug', 'category_id', 'status']);

    actingAs($admin)
        ->post($route, [
            'title' => 'Title',
            'slug' => 'slug',
            'body' => '# Body',
            'category_id' => Category::factory()->create()->id,
            'status' => PostStatus::Published->value,
        ])
        ->assertRedirect();

    assertDatabaseHas('posts', ['title' => 'Title', 'slug' => 'slug']);
});

test('GET admin.posts.show', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->for($category)->create();
    $route = route('admin.posts.show', $post);
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertRedirectToRoute('blog.post', [$category, $post]);
});

test('GET admin.posts.edit', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.edit', $post);
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.posts.edit')
        ->assertViewHasAll([
            'categories',
            'post',
            'statuses',
        ])
        ->assertOk();
});

test('PUT admin.posts.update', function () {
    $post = Post::factory()->create(['status' => PostStatus::Draft]);
    $route = route('admin.posts.update', $post);
    $admin = User::factory()->create();

    put($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->put($route, [
            'title' => '',
            'body' => '<h1>Unsafe markdown</h1>',
            'slug' => Post::factory()->create()->slug,
            'category_id' => 'not-exists',
            'status' => 'not-exists',
        ])
        ->assertInvalid(['title', 'body', 'slug', 'category_id', 'status']);

    actingAs($admin)
        ->put($route, [
            'title' => 'New title',
            'body' => '# New body',
            'slug' => 'new-slug',
            'category_id' => Category::factory()->create()->id,
            'status' => PostStatus::Published->value,
        ])
        ->assertRedirectBack();
});

test('DELETE admin.posts.destroy', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.destroy', $post);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectBack();
});

test('POST admin.posts.restore', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.restore', $post);
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route)
        ->assertRedirectBack();
});

test('DELETE admin.posts.force_destroy', function () {
    $post = Post::factory()->create();
    $route = route('admin.posts.force_destroy', $post);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectToRoute('admin.posts.index');
});
