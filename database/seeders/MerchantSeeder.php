<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchant')->insert([
            [
                'nama_merchant' => 'Soto Lamongan',
                'kategori' => 'Makanan',
                'alamat' => 'Royal Cannin',
                'email_merchant' => 'sotolamongan@gmail.com',
                'password_merchant' => bcrypt('merchant123'),
                'no_telp' => '0897767757878',
                'kota_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],

        ]);
    }
}
