<?php

namespace App\Models;

use App\Models\Formulir;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $fillable = [
        'wilayah_samsat'
    ];
    protected $table = 'wilayah';
    public function formulir()
    {
        return $this->hasMany(Formulir::class);
    }

}
