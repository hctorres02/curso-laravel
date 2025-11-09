<?php

use function Pest\Laravel\get;

test('GET admin.home', function () {
    $uri = route('admin.home');
    $response = get($uri);

    $response->assertOk();
});
