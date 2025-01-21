<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User', // Change as needed
            'email' => 'user@test.com', // Change as needed
            'password' => Hash::make('12345'), // Use Hash::make to hash the password
        ]);
    }
}
