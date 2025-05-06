<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'task_id', 'user_id', 'user_type'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id')->where('user_type', 'admin');
    }
}