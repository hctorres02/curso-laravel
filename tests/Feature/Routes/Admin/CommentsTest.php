<?php

use App\Enums\CommentStatus;
use App\Models\Comment;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('GET admin.comments.index', function () {
    $route = route('admin.comments.index');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get(route('admin.comments.index', [
            'status' => 'not-exists',
        ]))
        ->assertSessionHasErrors(['status']);

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.comments.index')
        ->assertViewHasAll([
            'comments',
            'searchParams',
            'statuses',
        ])
        ->assertOk();
});

test('POST admin.comments.approve', function () {
    $comment = Comment::factory()->create(['status' => CommentStatus::Pending]);
    $route = route('admin.comments.approve', $comment);
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route)
        ->assertRedirectBack();

    $comment = Comment::factory()->create(['status' => CommentStatus::Approved]);
    $route = route('admin.comments.approve', $comment);

    actingAs($admin)
        ->post($route)
        ->assertConflict();
});

test('DELETE admin.comments.destroy', function () {
    $comment = Comment::factory()->create();
    $route = route('admin.comments.destroy', $comment);
    $admin = User::factory()->create();

    delete($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->delete($route)
        ->assertRedirectBack();
});
