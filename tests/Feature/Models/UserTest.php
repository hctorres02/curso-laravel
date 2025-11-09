<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

// CASTS
test('hashes password automatically', function () {
    $user = User::factory()->create(['password' => '123456']);

    expect($user->password)->not->toBe('123456');
});

// RELATIONSHIPS
test('has avatar relationship', function () {
    //
});

test('has posts relationship', function () {
    $user = User::factory()->create();
    $posts = Post::factory()->count(3)->for($user, 'author')->create();

    expect($user->posts)->toHaveCount(3);
});

test('has comments relationship', function () {
    $user = User::factory()->create();
    $comments = Comment::factory()->count(2)->for($user, 'author')->create();

    expect($user->comments)->toHaveCount(2);
});
