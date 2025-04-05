<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomString = Str::random(6);
        $pet_name = fake()->name();
        $firstLetter = $pet_name[0];
        $lastLetter = $pet_name[strlen($pet_name) - 1];
        $reference_id = $firstLetter . $lastLetter . $randomString;

        return [
            'reference_id' => $reference_id,
            'name' => $pet_name,
        ];
    }
}
