<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    protected $fillable = ['voucher_id', 'wilayah_id', 'users_id', 'nama', 'nopol', 'image', 'status', 'unique_code'];

    protected $table = 'formulirs';

    // public $timestamps = false;

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    // ];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
