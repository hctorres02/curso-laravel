<?php

use App\Models\User;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

test('GET admin.users.index', function () {
    $route = route('admin.users.index');

    get($route)
        ->assertOk();
});

test('GET admin.users.create', function () {
    $route = route('admin.users.create');

    get($route)
        ->assertOk();
});

test('POST admin.users.store', function () {
    //
});

test('GET admin.users.show', function () {
    $user = User::factory()->create();
    $route = route('admin.users.show', $user);

    get($route)
        ->assertRedirectToRoute('admin.users.edit', $user);
});

test('GET admin.users.edit', function () {
    $user = User::factory()->create();
    $route = route('admin.users.edit', $user);

    get($route)
        ->assertOk();
});

test('PUT admin.users.update', function () {
    $user = User::factory()->create();
    $route = route('admin.users.update', $user);

    put($route)
        ->assertRedirectBack();
});

test('DELETE admin.users.destroy', function () {
    $user = User::factory()->create();
    $route = route('admin.users.destroy', $user);

    delete($route)
        ->assertRedirectBack();
});

test('POST admin.users.restore', function () {
    $user = User::factory()->create();
    $route = route('admin.users.restore', $user);

    post($route)
        ->assertRedirectBack();
});

test('DELETE admin.users.force_destroy', function () {
    $user = User::factory()->create();
    $route = route('admin.users.force_destroy', $user);

    delete($route)
        ->assertRedirectToRoute('admin.users.index');
});
