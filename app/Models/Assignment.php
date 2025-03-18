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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function score()
    {
        return $this->hasOne(Score::class, 'id_assignments', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'id_tasks', 'id');
    }
}
