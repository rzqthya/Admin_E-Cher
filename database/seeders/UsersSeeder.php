<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'masmbak admin',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('admin123'),

            ],
            [
                'name' => 'masmbak merchant',
                'email' => 'merchant@gmail.com',
                'password' => bcrypt('merchant123'),

            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
