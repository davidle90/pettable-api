<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pet::factory()->create([
            'reference_id' => 'TestPet1',
            'name' => 'Ice',
            'hunger' => 64,
            'happiness' => 81,
            'energy' => 75,
            'is_alive' => true
        ]);

        Pet::factory()->create([
            'reference_id' => 'TestPet2',
            'name' => 'N0SS',
            'hunger' => 86,
            'happiness' => 77,
            'energy' => 91,
            'is_alive' => true
        ]);

        Pet::factory()->create([
            'reference_id' => 'TestPet3',
            'name' => 'Clarimon',
            'hunger' => 35,
            'happiness' => 72,
            'energy' => 67,
            'is_alive' => true
        ]);

        Pet::factory()->create([
            'reference_id' => 'TestPet4',
            'name' => 'Fidde',
            'hunger' => 0,
            'happiness' => 75,
            'energy' => 0,
            'is_alive' => false
        ]);

        User::factory()->create([
            'reference_id' => 'AU123',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true
        ]);

        User::factory()->create([
            'reference_id' => 'TU456',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => false
        ]);
    }
}
