<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $fillable = ['samsat', 'alamat'];

    protected $table = 'wilayahs';

    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'wilayah_id');
    }
}

