<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => Str::title(fake()->words(6, true)),
            'slug' => fn (array $attributes) => Str::slug($attributes['title']),
            'body' => fake()->paragraphs(rand(20, 30), true),
            'headline' => fake()->text(200),
            'status' => fake()->randomElement(PostStatus::cases()),
        ];
    }
}
