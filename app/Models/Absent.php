<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = [
        'id_users',
        'status',
        'keterangan',
        'kategori'
    ];
}
