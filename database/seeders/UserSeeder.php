<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'admin', 'email' => 'nandytyabaguuss@gmail.com', 'username' => 'admin123', 'role' => 'admin', 'password' => 'admin']); 
        User::create(['name' => 'pelanggan', 'email' => 'nandytyabagusss@gmail.com', 'username' => 'customer123', 'role' => 'pelanggan', 'password' => 'customer']); 
    }
}