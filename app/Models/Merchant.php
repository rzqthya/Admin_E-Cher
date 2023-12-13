<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = ['users_id', 'kota_id', 'kategori', 'alamat'];

    protected $table = 'merchants';

    public $timestamps = false;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
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
