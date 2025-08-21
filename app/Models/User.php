<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'password', 'admin', 'last_logged'];

    public function outgoing_letter()
    {
        return $this->hasMany(Outgoing_letter::class, "user_id");
    }

    public function incoming_letter()
    {
        return $this->hasMany(Incoming_letter::class, "user_id");
    }

    public function getAdmin()
    {
        return $this->attributes['admin'];
    }
}
