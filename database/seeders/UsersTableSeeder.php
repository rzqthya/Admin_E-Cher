<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Admin user
          DB::table('users')->insert([
            'nama' => 'Admin User',
            'email' => 'admin123@example.com',
            'password' => Hash::make('password'), // Hash the password
            'noTelp' => '12345',
            'role' => 'admin',
            'created_at' => now(),
        ]);

        // // Merchant user
        // DB::table('users')->insert([
        //     'nama' => 'Merchant User',
        //     'email' => 'merchant@example.com',
        //     'password' => Hash::make('password'),
        //     'noTelp' => '12345',
        //     'role' => 'merchant',
        //     'created_at' => now(),
        // ]);

        // // Customer user
        // DB::table('users')->insert([
        //     'nama' => 'Customer User',
        //     'email' => 'customer@example.com',
        //     'password' => Hash::make('password'),
        //     'noTelp' => '555555555',
        //     'role' => 'customer',
        //     'created_at' => now(),
        // ]);

    }
}
