<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create two default users for login (development)
        // Admin (create or update)
        User::updateOrCreate([
            'email' => 'admin@inventory.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Gudang (create or update)
        User::updateOrCreate([
            'email' => 'gudang@inventory.com',
        ], [
            'name' => 'Gudang',
            'password' => Hash::make('password'),
            'role' => 'gudang',
        ]);

        // Keep test user for legacy/tests (create if missing)
        User::updateOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => Hash::make('password'),
            'role' => 'gudang',
        ]);

        // Panggil ProductSeeder
        $this->call(ProductSeeder::class);
    }
}