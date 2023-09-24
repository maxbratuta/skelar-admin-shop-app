<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Infrastructure\Persistence\Eloquent\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        # Admin
        User::create([
            'name' => 'Mr. Admin',
            'email' => 'admin@skelar-shop.com',
            'password' => Hash::make('admin'),
            'role' => User::ADMIN_USER_ROLE,
            'email_verified_at' => now(),
        ]);

        # User
        User::create([
            'name' => 'Mrs. User',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'role' => User::BASIC_USER_ROLE,
            'email_verified_at' => now(),
        ]);
    }
}
