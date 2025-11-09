<?php

use App\Models\User;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET admin.users.index', function () {
    $uri = route('admin.users.index');
    $response = get($uri);

    $response->assertOk();
});

test('GET admin.users.create', function () {
    $uri = route('admin.users.create');
    $response = get($uri);

    $response->assertOk();
});

test('POST admin.users.store', function () {
    //
});

test('GET admin.users.show', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.show', $user);
    $response = get($uri);

    $response->assertOk();
});

test('GET admin.users.edit', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.edit', $user);
    $response = get($uri);

    $response->assertOk();
});

test('PUT admin.users.update', function () {
    //
});

test('DELETE admin.users.destroy', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.destroy', $user);
    $response = delete($uri);

    $response->assertRedirectToRoute('admin.users.edit', $user);
});

test('POST admin.users.restore', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.restore', $user);
    $response = post($uri);

    $response->assertRedirectToRoute('admin.users.edit', $user);
});

test('DELETE admin.users.force_destroy', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.force_destroy', $user);
    $response = delete($uri);

    $response->assertRedirectToRoute('admin.users.index');
});
