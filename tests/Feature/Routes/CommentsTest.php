<?php

use App\Models\Comment;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET comments.index', function () {
    $route = route('comments.index');

    get($route)
        ->assertOk();
});

test('POST comments.store', function () {
    $route = route('comments.store');

    post($route)
        ->assertRedirectBack();
});

test('DELETE comments.destroy', function () {
    $comment = Comment::factory()->create();
    $route = route('comments.destroy', $comment);

    delete($route)
        ->assertRedirectBack();
});
