<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@superuser.com',
            'password' => Hash::make('123'),
            'user_type' => User::ADMIN
        ]);

        User::create([
            'first_name' => 'John',
            'last_name' => 'Lloyd',
            'email' => 'customer@customer.com',
            'password' => Hash::make('123'),
            'user_type' => User::USER
        ]);
    }
}
