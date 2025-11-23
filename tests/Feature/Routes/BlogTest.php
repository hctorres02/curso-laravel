<?php

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('GET blog.category', function () {
    $category = Category::factory()->create();
    $route = route('blog.category', $category);

    get($route)
        ->assertViewIs('blog.category')
        ->assertViewHasAll([
            'category',
            'posts',
        ])
        ->assertOk();
});

test('GET blog.post', function () {
    $post = Post::factory()->for(Category::factory())->create(['status' => PostStatus::Published]);
    $route = route('blog.post', [$post->category, $post]);

    get($route)
        ->assertViewIs('blog.post')
        ->assertViewHasAll([
            'category',
            'post',
        ])
        ->assertOk();

    $post = Post::factory()->for(Category::factory())->create(['status' => PostStatus::Draft]);
    $route = route('blog.post', [$post->category, $post]);
    $admin = User::factory()->create();

    get($route)
        ->assertNotFound();

    actingAs($admin)
        ->get($route)
        ->assertOk();
});
