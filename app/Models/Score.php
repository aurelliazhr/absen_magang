<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'nilai',
        'catatan',
        'id_assignments',
        'id_tasks',
        'id_users'
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'id_assignments', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function tasks()
    {
        return $this->belongsTo(Task::class, 'id_tasks', 'id');
    }
}
