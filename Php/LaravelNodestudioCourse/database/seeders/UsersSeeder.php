<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'firstName' => 'Vitor',
        //     'lastName' => 'De Almeida',
        //     'email' => 'vitor@example.com',
        //     'password' => bcrypt('password123@@'),
        // ]);
        User::factory(5)->create();
    }
}
