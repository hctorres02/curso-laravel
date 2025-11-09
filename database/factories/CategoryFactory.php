<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Str::title(fake()->words(2, true)),
            'slug' => fn (array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->text(),
        ];
    }
}
