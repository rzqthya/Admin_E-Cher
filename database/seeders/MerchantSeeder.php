<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchantUser = User::where('role', 'merchant')->first();

        if ($merchantUser) {
           
            $data = [
                [
                    'users_id' => $merchantUser->id,
                    'kota_id' => 1,
                    'merchant' => 'Mixue Cabang Semarang',
                    'kategori' => 'Minuman',
                    'alamat' => 'JL. SEMARANG NO 45',
                    'created_at' => now(),
                ],
             
            ];

        
            Merchant::insert($data);
        }
    }
}
