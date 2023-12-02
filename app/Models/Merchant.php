<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = ['users_id', 'kota_id', 'merchant', 'kategori', 'alamat'];

    protected $table = 'merchants';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function kotas()
    {
        return $this->hasMany(Kota::class, 'kota_id');
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'merchant_id');
    }

    public function formulir()
    {
        return $this->belongsTo(Formulir::class);
    }
}
