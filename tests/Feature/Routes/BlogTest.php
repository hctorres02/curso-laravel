<?php

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;

use function Pest\Laravel\get;

test('GET blog.category', function () {
    $category = Category::factory()->create();
    $route = route('blog.category', $category);

    get($route)
        ->assertViewIs('blog.category')
        ->assertViewHasAll([
            'shared_categories',
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
            'shared_categories',
            'category',
            'post',
        ])
        ->assertOk();
});
