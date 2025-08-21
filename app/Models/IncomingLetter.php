<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class IncomingLetter extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'date', 'number', 'sender', 'street', 'city', 'code', 'country', 'user_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
