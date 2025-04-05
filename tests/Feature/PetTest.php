<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

it('returns a pet by reference_id', function () {

    $user = User::where('reference_id', 'TU456')->first();
    $response = $this->actingAs($user)->getJson("/api/v1/pets/TestPet1");

    $response->assertOk()
             ->assertJson(fn (AssertableJson $json) =>
                 $json->where('data.attributes.referenceId', 'TestPet1')
                      ->etc()
             );
});

it('returns a 404 if pet not found', function () {

    $user = User::where('reference_id', 'TU456')->first();
    $response = $this->actingAs($user)->getJson('/api/v1/pets/nonexistent-id');

    $response->assertStatus(404)
             ->assertJson([
                 'message' => 'Pet not found.',
             ]);
});
