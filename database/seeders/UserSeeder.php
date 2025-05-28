<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Regular User',
                'email' => 'user@user.com',
                'password' => Hash::make('12345678'),
                'role' => User::ROLE_DEFAULT,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'role' => 'ADMIN', // You can change this based on your system roles
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
