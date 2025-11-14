<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        $categories = Category::all();

        foreach ($categories as $category) {
            Post::factory()
                ->count(rand(6, 18))
                ->for($author, 'author')
                ->for($category, 'category')
                ->create([
                    'created_at' => fn () => fake()->dateTimeBetween($category->created_at),
                ]);
        }
    }
}
