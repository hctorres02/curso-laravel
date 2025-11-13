<?php

use App\Models\Comment;
use App\Models\User;

use function Pest\Laravel\actingAs;

test('GET comments.index', function () {
    $uri = route('comments.index');
    $user = User::factory()->create();
    $response = actingAs($user)->get($uri);

    $response->assertOk();
    $response->assertViewIs('comments.index');
});

test('POST comments.store', function () {
    $uri = route('comments.store');
    $user = User::factory()->create();
    $response = actingAs($user)->post($uri);

    $response->assertRedirectBack();
});

test('DELETE comments.destroy', function () {
    $comment = Comment::factory()->create();
    $uri = route('comments.destroy', $comment);
    $user = User::factory()->create();
    $response = actingAs($user)->delete($uri);

    $response->assertRedirectBack();
});
