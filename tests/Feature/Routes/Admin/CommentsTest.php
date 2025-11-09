<?php

use App\Models\Comment;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

test('GET admin.comments.index', function () {
    $uri = route('admin.comments.index');
    $response = get($uri);

    $response->assertOk();
});

test('PUT admin.comments.update', function () {
    $comment = Comment::factory()->create();
    $uri = route('admin.comments.update', $comment);
    $response = put($uri);

    $response->assertAccepted();
});

test('DELETE admin.comments.destroy', function () {
    $comment = Comment::factory()->create();
    $uri = route('admin.comments.destroy', $comment);
    $response = delete($uri);

    $response->assertNoContent();
});
