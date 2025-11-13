<?php

use App\Models\Category;
use App\Models\Post;

// RELATIONSHIPS
test('has many posts', function () {
    $category = Category::factory()->create();
    $posts = Post::factory()->count(3)->for($category)->create();

    expect($category->posts)->toHaveCount(3);
});
