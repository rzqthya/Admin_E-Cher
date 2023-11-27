<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $fillable = [
        'nama_user',
        'email_user',
        'nopol',
        'no_hp',
        'uploadFoto',
        'wilayah_id',
        'merchant_id',
        'voucher_id',
        'status_voucher',
        'status_klaim',
    ];

    protected $table = 'formulir';

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }


}

