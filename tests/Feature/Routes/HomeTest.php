<?php

use function Pest\Laravel\get;

test('GET home', function () {
    $route = route('home');

    get($route)
        ->assertOk();
});
