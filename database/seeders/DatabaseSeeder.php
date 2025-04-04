<?php

namespace Database\Seeders;

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
        //User::factory(10)->create();

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
