<?php

use App\Models\Comment;

use App\Models\User;
use function Pest\Laravel\actingAs;

test('GET admin.comments.index', function () {
    $uri = route('admin.comments.index');
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.comments.index');
});

test('PUT admin.comments.update', function () {
    $comment = Comment::factory()->create();
    $uri = route('admin.comments.update', $comment);
    $admin = User::factory()->create();
    $response = actingAs($admin)->put($uri);

    $response->assertAccepted();
});

test('DELETE admin.comments.destroy', function () {
    $comment = Comment::factory()->create();
    $uri = route('admin.comments.destroy', $comment);
    $admin = User::factory()->create();
    $response = actingAs($admin)->delete($uri);

    $response->assertNoContent();
});
