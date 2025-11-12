<?php

use function Pest\Laravel\get;

test('GET home', function () {
    $uri = route('home');
    $response = get($uri);

    $response->assertOk();
    $response->assertViewIs('home');
    $response->assertViewHas('categories');
});
