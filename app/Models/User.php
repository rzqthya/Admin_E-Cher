<?php

namespace App\Models;

use App\Models\Merchant;
use App\Models\Formulir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'nama',
        'email',
        'password',
        'noTelp',
        'role',
    ];

    protected $table = 'users';

    public $timestamps = false; 

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'users_id');
    }

    public function formulirs()
    {
        return $this->hasMany(Formulir::class, 'users_id');
    }
}
