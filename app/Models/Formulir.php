<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $fillable = ['voucher_id', 'wilayah_id', 'users_id', 'nama', 'nopol', 'image'];

    protected $table = 'formulirs';

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function wilayah()
    {
        return $this->hasOne(Wilayah::class, 'wilayah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
