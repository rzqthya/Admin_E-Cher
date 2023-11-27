<?php

namespace App\Models;

use App\Models\Formulir;
use App\Models\Kota;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Merchant extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        'nama_merchant',
        'kategori',
        'alamat',
        'no_telp',
        'email',
        'password',
        'kota_id',
    ];

    protected $table = 'merchant';

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
    }
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function formulir()
    {
        return $this->hasOne(Formulir::class);
    }
}