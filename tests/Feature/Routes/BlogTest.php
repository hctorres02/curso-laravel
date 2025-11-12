<?php

use App\Models\Category;
use App\Models\Post;

use function Pest\Laravel\get;

test('GET blog.category', function () {
    $category = Category::factory()->create();
    $uri = route('blog.category', $category);
    $response = get($uri);

    $response->assertOk();
    $response->assertViewIs('blog.category');
    $response->assertViewHasAll(['categories', 'category', 'posts']);
});

test('GET blog.post', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->for($category)->create();
    $uri = route('blog.post', [$category, $post]);
    $response = get($uri);

    $response->assertOk();
    $response->assertViewIs('blog.post');
    $response->assertViewHasAll(['categories', 'category', 'post']);
});
