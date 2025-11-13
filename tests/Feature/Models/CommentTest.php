<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

// CASTS
test('cast status to enum', function () {
    $commentApproved = Comment::factory()->create(['status' => 'approved']);
    $commentPending = Comment::factory()->create(['status' => 'pending']);

    expect($commentApproved->status->value)->toBe('approved');
    expect($commentPending->status->value)->toBe('pending');
});

// RELATIONSHIPS
test('belongs to author', function () {
    $comment = Comment::factory()->for(User::factory(), 'author')->create();

    expect($comment->author)->toBeInstanceOf(User::class);
});

test('belongs to post', function () {
    $comment = Comment::factory()->for(Post::factory())->create();

    expect($comment->post)->toBeInstanceOf(Post::class);
});
