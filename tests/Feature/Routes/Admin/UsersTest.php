<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

test('GET admin.users.index', function () {
    $uri = route('admin.users.index');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.users.index');
});

test('GET admin.users.create', function () {
    $uri = route('admin.users.create');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.users.create');
});

test('POST admin.users.store', function () {
    //
});

test('GET admin.users.show', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.show', $user);
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
});

test('GET admin.users.edit', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.edit', $user);
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.users.edit');
});

test('PUT admin.users.update', function () {
    //
});

test('DELETE admin.users.destroy', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.destroy', $user);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertRedirectToRoute('admin.users.edit', $user);
});

test('POST admin.users.restore', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.restore', $user);
    $admin = User::factory()->create();
    $response = actingAs($admin)->post($uri);

    $response->assertRedirectToRoute('admin.users.edit', $user);
});

test('DELETE admin.users.force_destroy', function () {
    $user = User::factory()->create();
    $uri = route('admin.users.force_destroy', $user);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertRedirectToRoute('admin.users.index');
});
