<?php

use function Pest\Laravel\get;

test('GET home', function () {
    $route = route('home');
    $response = get($route);

    $response->assertOk();
});
