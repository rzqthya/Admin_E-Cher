<?php

namespace App\Models;

use App\Models\Formulir;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'nama_voucher',
        'deskripsi_voucher',
        'masa_berlaku',
        'fotoVoucher',
        'merchant_id',
    ];

    protected $table = 'voucher';

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function formulir()
    {
        return $this->belongsTo(Formulir::class);
    }


}
