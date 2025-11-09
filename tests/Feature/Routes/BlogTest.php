<?php

use App\Models\Category;
use App\Models\Post;

use function Pest\Laravel\get;

test('GET blog.category', function () {
    $category = Category::factory()->create();
    $route = route('blog.category', $category);
    $response = get($route);

    $response->assertOk();
});

test('GET blog.post', function () {
    $category = Category::factory()->create();
    $post = Post::factory()->for($category)->create();
    $route = route('blog.post', [$category, $post]);
    $response = get($route);

    $response->assertOk();
});
