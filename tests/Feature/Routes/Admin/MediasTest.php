<?php

use function Pest\Laravel\get;

test('GET admin.medias.index', function () {
    $route = route('admin.medias.index');

    get($route)
        ->assertOk();
});

test('GET admin.medias.create', function () {
    $route = route('admin.medias.create');

    get($route)
        ->assertOk();
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
