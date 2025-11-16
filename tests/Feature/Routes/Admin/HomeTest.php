<?php

use function Pest\Laravel\get;

test('GET admin.home', function () {
    $route = route('admin.home');

    get($route)
        ->assertOk();
});
