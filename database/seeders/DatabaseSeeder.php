<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tool;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone_number' => '08123456789',
            'address' => 'Jl. Admin No. 1',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'phone_number' => '08123456789',
            'address' => 'Jl. user No. 1',
        ]);

        Tool::create([
            'product_number' => 1001,
            'name' => 'Tenda Pernikahan',
            'price' => 250000,
            'total_quantity' => 10,
            'status' => 'available',
            'description' => 'Tenda pernikahan yang elegan dan luas, cocok untuk acara besar.',
            'image' => 'wedding.jpg',
        ]);
    }
}
