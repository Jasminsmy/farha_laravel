<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Manager User
        DB::table('users')->insert([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Developer User
        DB::table('users')->insert([
            'name' => 'Developer User',
            'email' => 'developer@example.com',
            'password' => Hash::make('password'),
            'role' => 'developer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
