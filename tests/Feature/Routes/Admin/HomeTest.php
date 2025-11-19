<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('GET admin.home', function () {
    $route = route('admin.home');
    $admin = User::factory()->create();

    get($route)
        ->assertRedirectToRoute('login');

    actingAs($admin)
        ->get($route)
        ->assertViewIs('admin.home')
        ->assertViewHasAll([
            // info boxes
            'countCategories',
            'countComments',
            'countPosts',
            'countUsers',

            // charts
            'monthlyPosts',
            'monthlyComments',
            'storageUsage',
        ])
        ->assertOk();
});
