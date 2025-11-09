<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    public function run(): void
    {
        Category::factory()->count(rand(12, 21))->create([
            'created_at' => fn () => fake()->dateTimeThisYear(),
        ]);
    }
}
