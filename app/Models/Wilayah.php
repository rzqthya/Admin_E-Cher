<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $fillable = ['samsat', 'alamat'];

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'wilayah_id');
    }
}

