<?php

use App\Models\Category;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.categories.index', function () {
    $route = route('admin.categories.index');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.categories.index')
        ->assertViewHasAll([
            'categories', 'searchParams',
        ])
        ->assertOk();
});

test('GET admin.categories.create', function () {
    $route = route('admin.categories.create');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.categories.create')
        ->assertOk();
});

test('POST admin.categories.store', function () {
    //
});

test('GET admin.categories.show', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.show', $category);
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertRedirectToRoute('blog.category', $category);
});

test('GET admin.categories.edit', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.edit', $category);
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.categories.edit')
        ->assertViewHasAll([
            'category',
        ])
        ->assertOk();
});

test('PUT admin.categories.update', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.update', $category);
    $admin = User::factory()->create();

    put($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->put($route, [
            'name' => '',
            'description' => '',
            'slug' => Category::factory()->create()->slug,
        ])
        ->assertInvalid(['name', 'description', 'slug']);

    actingAs($admin)
        ->put($route, [
            'name' => 'New name',
            'description' => 'New description',
        ])
        ->assertRedirectBack();
});

test('DELETE admin.categories.destroy', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.destroy', $category);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectBack();
});

test('POST admin.categories.restore', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.restore', $category);
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route)
        ->assertRedirectBack();
});

test('DELETE admin.categories.force_destroy', function () {
    $category = Category::factory()->create();
    $route = route('admin.categories.force_destroy', $category);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectToRoute('admin.categories.index');
});
