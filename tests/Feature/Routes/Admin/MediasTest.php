<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

test('GET admin.medias.index', function () {
    $uri = route('admin.medias.index');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.medias.index');
});

test('GET admin.medias.create', function () {
    $uri = route('admin.medias.create');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.medias.create');
});

test('POST admin.medias.store', function () {
    //
});

test('GET admin.medias.show', function () {
    //
});

test('GET admin.medias.edit', function () {
    //
});

test('PUT admin.medias.update', function () {
    //
});

test('DELETE admin.medias.destroy', function () {
    //
});
