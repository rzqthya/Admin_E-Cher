<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Format tanggal dalam 'Y-m-d'
        $tanggalBerlaku = Carbon::create(2023, 12, 25); // Tanggal berlaku: 25 Desember 2023

        // Data voucher
        $data = [
            'nama_voucher' => 'Chatime 50% Promo Natal',
            'deskripsi_voucher' => 'Promo Buy 2 get Diskon 50%',
            'masa_berlaku' => $tanggalBerlaku, // Menggunakan objek Carbon untuk tipe data date
            'merchant_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ];

        DB::table('voucher')->insert($data);
    }
}
