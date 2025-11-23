<?php

use App\Enums\PostStatus;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
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
            'comments',
        ])
        ->assertOk();
});

test('POST comments.store', function () {
    $post = Post::factory()->create(['status' => PostStatus::Published]);
    $route = route('comments.store', $post);
    $admin = User::factory()->create();

    post($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->post($route, [
            'body' => '',
        ])
        ->assertInvalid(['body']);

    actingAs($admin)
        ->post($route, [
            'body' => 'Comment body',
        ])
        ->assertRedirectBack();

    assertDatabaseHas('comments', ['body' => 'Comment body']);
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
