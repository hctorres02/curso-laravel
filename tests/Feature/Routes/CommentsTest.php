<?php

use App\Models\Comment;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET comments.index', function () {
    $route = route('comments.index');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('comments.index')
        ->assertViewHasAll([
            'shared_categories',
            'comments',
        ])
        ->assertOk();
});

test('POST comments.store', function () {
    $route = route('comments.store');
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route)
        ->assertRedirectBack();
});

test('DELETE comments.destroy', function () {
    $comment = Comment::factory()->create();
    $route = route('comments.destroy', $comment);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectBack();
});
