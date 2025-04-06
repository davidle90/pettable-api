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
        Pet::firstOrCreate(
            ['reference_id' => 'TestPet1'],
            [
                'name' => 'Ice',
                'hunger' => 59,
                'happiness' => 81,
                'energy' => 63,
                'is_alive' => true
            ]
        );

        Pet::firstOrCreate(
            ['reference_id' => 'TestPet2'],
            [
                'name' => 'N0SS',
                'hunger' => 65,
                'happiness' => 73,
                'energy' => 84,
                'is_alive' => true
            ]
        );

        Pet::firstOrCreate(
            ['reference_id' => 'TestPet3'],
            [
                'name' => 'Clarimon',
                'hunger' => 25,
                'happiness' => 67,
                'energy' => 59,
                'is_alive' => true
            ]
        );

        Pet::firstOrCreate(
            ['reference_id' => 'TestPet4'],
            [
                'name' => 'Fidde',
                'hunger' => 0,
                'happiness' => 99,
                'energy' => 0,
                'is_alive' => false
            ]
        );

        User::firstOrCreate(
            ['reference_id' => 'AU123'],
            [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true
            ]
        );

        User::firstOrCreate(
            ['reference_id' => 'TU456'],
            [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'is_admin' => false
            ]
        );
    }
}
