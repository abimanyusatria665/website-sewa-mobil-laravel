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
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone_number' => "1231415",
            'password' => Hash::make('user')
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone_number' => "12312444",
            'password' => Hash::make('admin'),
            'roles' => 'admin'
        ]);
    }
}
