<?php

use function Pest\Laravel\get;

test('GET admin.home', function () {
    $route = route('admin.home');

    get($route)
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
