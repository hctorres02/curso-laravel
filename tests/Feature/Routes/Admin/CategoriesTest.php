<?php

use App\Models\Category;
use App\Models\User;

use function Pest\Laravel\actingAs;

test('GET admin.categories.index', function () {
    $uri = route('admin.categories.index');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.categories.index');
});

test('GET admin.categories.create', function () {
    $uri = route('admin.categories.create');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.categories.create');
});

test('POST admin.categories.store', function () {
    //
});

test('GET admin.categories.show', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.show', $category);
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertRedirectToRoute('blog.category', $category);
});

test('GET admin.categories.edit', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.edit', $category);
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.categories.edit');
});

test('PUT admin.categories.update', function () {
    //
});

test('DELETE admin.categories.destroy', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.destroy', $category);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertRedirectToRoute('admin.categories.edit', $category);
});

test('POST admin.categories.restore', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.restore', $category);
    $admin = User::factory()->create();
    $response = actingAs($admin)->post($uri);

    $response->assertRedirectToRoute('admin.categories.edit', $category);
});

test('DELETE admin.categories.force_destroy', function () {
    $category = Category::factory()->create();
    $uri = route('admin.categories.force_destroy', $category);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertRedirectToRoute('admin.categories.index');
});
