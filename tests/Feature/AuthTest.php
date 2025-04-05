<?php

use function Pest\Laravel\postJson;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertAuthenticated;

it('authenticates via API and returns token', function () {

    $response = postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $response->assertOk()
        ->assertJsonStructure([
            'message',
            'data' => ['token', 'user_reference'],
        ]);
});
