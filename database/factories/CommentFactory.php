<?php

namespace Database\Factories;

use App\Enums\CommentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'post_id' => Post::factory(),
            'body' => fake()->text(),
            'status' => fake()->randomElement(CommentStatus::cases()),
        ];
    }
}
