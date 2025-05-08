<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    protected $guarded = [];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function isSuperAdmin() {
        return $this->role->is_super_admin == Role::STATUS_YES ? true : false;
    }

    public function hasPermission($permission) {
        if($this->isSuperAdmin()) {
            return true;
        }
       
        return $this->role()->whereHas("permissions", function($query) use ($permission) {
            $query->where("key", $permission);
        })->exists();
    }

    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver')
                ->where('is_read', false);
    }
}
