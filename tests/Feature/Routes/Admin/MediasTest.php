<?php

use function Pest\Laravel\get;

test('GET admin.medias.index', function () {
    $uri = route('admin.medias.index');
    $response = get($uri);

    $response->assertOk();
});

test('GET admin.medias.create', function () {
    $uri = route('admin.medias.create');
    $response = get($uri);

    $response->assertOk();
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
