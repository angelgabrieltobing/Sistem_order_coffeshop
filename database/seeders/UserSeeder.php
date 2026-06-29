<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // Customer
        User::updateOrCreate(
            ['email' => 'customer@gmail.com'],
            [
                'name' => 'Customer',
                'password' => Hash::make('customer123'),
                'role' => 'customer',
            ]
        );
    }
}