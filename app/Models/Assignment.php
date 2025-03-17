<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'id_tasks', 
        'id_users',
        'judul',
        'file'
    ];
}
