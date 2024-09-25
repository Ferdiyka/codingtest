<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Nanda',
            'email' => 'admin@gmail.com',
            'birthdate' => '2024/04/24',
            'gender' => 'male',
            'password' => Hash::make('123456'),
        ]);
    }
}
