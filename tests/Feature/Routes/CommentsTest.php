<?php

use App\Models\Comment;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET comments.index', function () {
    $uri = route('comments.index');
    $response = get($uri);

    $response->assertOk();
    $response->assertViewIs('comments.index');
});

test('POST comments.store', function () {
    $uri = route('comments.store');
    $response = post($uri);

    $response->assertRedirectBack();
});

test('DELETE comments.destroy', function () {
    $comment = Comment::factory()->create();
    $uri = route('comments.destroy', $comment);
    $response = delete($uri);

    $response->assertRedirectBack();
});
