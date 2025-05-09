<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function users()
{
    return $this->belongsToMany(User::class, 'task_user');
}
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
