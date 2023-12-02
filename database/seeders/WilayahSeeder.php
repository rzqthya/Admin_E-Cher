<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'samsat' => 'Samsat Pemalang',
                'alamat' => 'Pemalang',
                'created_at' => now(),
            ],
            [
                'samsat' => 'Samsat Semarang Utara',
                'alamat' => 'Jl. Ahmad Yani ',
                'created_at' => now(),
            ],
        
        ];

        // Masukkan data ke dalam tabel wilayahs
        DB::table('wilayahs')->insert($data);
    }
}
