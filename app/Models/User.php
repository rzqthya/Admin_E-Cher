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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'noTelp',
        'role',
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the merchant associated with the user.
     */
    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'users_id');
    }

    /**
     * Get the formulirs associated with the user.
     */
    public function formulirs()
    {
        return $this->hasMany(Formulir::class, 'users_id');
    }
}
