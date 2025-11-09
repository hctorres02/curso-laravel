<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

// CASTS
test('cast status to enum', function () {
    $post = Post::factory()->create(['status' => 'draft']);

    expect($post->status->value)->toBe('draft');
});

// ACCESSOR/MUTATOR
test('decodes markdown body', function () {
    $post = Post::factory()->create(['body' => '# title']);

    expect($post->bodyDecoded)->not->toBeNull();
});

// RELATIONSHIPS
test('belongs to author', function () {
    $post = Post::factory()->for(User::factory(), 'author')->create();

    expect($post->author)->toBeInstanceOf(User::class);
});

test('belongs to cover media', function () {
    //
});

test('belongs to category', function () {
    $post = Post::factory()->for(Category::factory())->create();

    expect($post->category)->toBeInstanceOf(Category::class);
});

test('has many comments', function () {
    $post = Post::factory()->create();
    $comments = Comment::factory()->count(4)->for($post)->create();

    expect($post->comments)->toHaveCount(4);
});
