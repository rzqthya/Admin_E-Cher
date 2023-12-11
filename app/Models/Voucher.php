<?php
// app/Models/Voucher.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['merchant_id', 'voucher', 'deskripsi', 'masaBerlaku', 'image'];

    protected $table = 'vouchers';

    public $timestamps = false; 

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function formulir()
    {
        return $this->hasOne(Formulir::class, 'voucher_id');
    }
}
