<?php

namespace App\Actions;
use App\Models\IncomingLetter;
use Illuminate\Http\Request;

class StoreIncomingLetterAction
{
    public static function run(Request $request): void
    {
        $letter = IncomingLetter::create([
            'date' => $request['date'],
            'number' => $request['number'],
            'sender' => $request['sender'],
            'street' => $request['street'],
            'city' => $request['city'],
            'code' => $request['code'],
            'country' => $request['country'],
            'user_id' => auth()->user()->id,
        ]);
    }
}
