<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outgoing_letter extends Model
{
    protected $fillable = ['id', 'send_date', 'letter_num', 'recipient', 'street', 'house_num', 'flat_num', 'city', 'post_code', 'post', 'user_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
