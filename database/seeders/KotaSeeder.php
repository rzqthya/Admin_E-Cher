<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kota' => 'Semarang'],
            ['kota' => 'Kudus'],
            ['kota' => 'Pemalang'],
           
        ];

     
        DB::table('kotas')->insert($data);
    }
}
