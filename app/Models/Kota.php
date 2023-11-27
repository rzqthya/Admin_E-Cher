<?php

namespace App\Models;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = [
        'nama_kota'
    ];

    protected $table = 'kota';


    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }
    use HasFactory;
}
