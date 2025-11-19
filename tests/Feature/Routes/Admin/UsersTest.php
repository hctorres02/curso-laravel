<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.users.index', function () {
    $route = route('admin.users.index');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.users.index')
        ->assertViewHasAll([
            'roles',
            'searchParams',
            'users',
        ])
        ->assertOk();
});

test('GET admin.users.create', function () {
    $route = route('admin.users.create');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.users.create')
        ->assertViewHasAll([
            'permissions',
            'roles',
        ])
        ->assertOk();
});

test('POST admin.users.store', function () {
    //
});

test('GET admin.users.show', function () {
    $user = User::factory()->create();
    $route = route('admin.users.show', $user);
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertRedirectToRoute('admin.users.edit', $user);
});

test('GET admin.users.edit', function () {
    $user = User::factory()->create();
    $route = route('admin.users.edit', $user);
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.users.edit')
        ->assertViewHasAll([
            'permissions',
            'roles',
        ])
        ->assertOk();
});

test('PUT admin.users.update', function () {
    $user = User::factory()->create();
    $route = route('admin.users.update', $user);
    $admin = User::factory()->create();

    put($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->put($route)
        ->assertRedirectBack();
});

test('DELETE admin.users.destroy', function () {
    $user = User::factory()->create();
    $route = route('admin.users.destroy', $user);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectBack();
});

test('POST admin.users.restore', function () {
    $user = User::factory()->create();
    $route = route('admin.users.restore', $user);
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route)
        ->assertRedirectBack();
});

test('DELETE admin.users.force_destroy', function () {
    $user = User::factory()->create();
    $route = route('admin.users.force_destroy', $user);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectToRoute('admin.users.index');
});
