<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('hello123'),
            'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Counsellor John',
            'email' => 'john@example.com',
            'password' => Hash::make('hello123'),
            'is_counsellor' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Adeel Ahmed',
            'email' => 'adeel@example.com',
            'password' => Hash::make('hello123')
        ]);
    }
}
