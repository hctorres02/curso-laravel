<?php

use App\Enums\CommentStatus;
use App\Models\Comment;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET admin.comments.index', function () {
    $route = route('admin.comments.index');

    get($route)
        ->assertOk();
});

test('POST admin.comments.approve', function () {
    $comment = Comment::factory()->create(['status' => CommentStatus::Pending]);
    $route = route('admin.comments.approve', $comment);

    post($route)
        ->assertRedirectBack();
});

test('DELETE admin.comments.destroy', function () {
    $comment = Comment::factory()->create();
    $route = route('admin.comments.destroy', $comment);

    delete($route)
        ->assertRedirectBack();
});
