<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = ['kota'];
    
    protected $table = 'kotas';

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
