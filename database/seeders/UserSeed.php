<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(5)
            ->state(new Sequence(
                ['name' => 'Admin'],
                ['name' => 'Beatriz'],
                ['name' => 'César'],
                ['name' => 'Dário'],
                ['name' => 'Erick'],
            ))
            ->create();
    }
}
