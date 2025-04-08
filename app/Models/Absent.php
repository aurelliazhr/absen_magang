<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $table = 'absents';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
