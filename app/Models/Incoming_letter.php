<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incoming_letter extends Model
{
    protected $fillable = ['id', 'incoming_date', 'letter_num', 'sender_name', 'street', 'house_num', 'flat_num', 'city', 'post_code', 'post', 'user_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
