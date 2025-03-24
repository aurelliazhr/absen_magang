<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id_teachers',
        'judul',
        'deskripsi',
        'file',
        'batas_pengumpulan'
    ];
}
