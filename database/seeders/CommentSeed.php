<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeed extends Seeder
{
    public function run(): void
    {
        $authors = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            Comment::factory()
                ->count(rand(3, 5))
                ->for($authors->random(), 'author')
                ->for($post, 'post')
                ->create([
                    'created_at' => fn () => fake()->dateTimeBetween($post->created_at),
                ]);
        }
    }
}
