<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    protected $guard = 'teacher';
    protected $fillable = [
        'nama',
        'posisi',
        'email',
        'password',
        'foto_profil'
    ];
}
