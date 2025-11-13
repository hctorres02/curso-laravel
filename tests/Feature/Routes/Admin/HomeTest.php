<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('GET admin.home', function () {
    $uri = route('admin.home');

    // guest
    get($uri)->assertRedirectToRoute('login');

    // authenticated
    $admin = User::factory()->create();
    $response = actingAs($admin)->get($uri);

    $response->assertOk();
    $response->assertViewIs('admin.home');
});
