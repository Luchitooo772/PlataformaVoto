<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'foto_face',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
