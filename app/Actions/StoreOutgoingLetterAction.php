<?php

namespace App\Actions;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class StoreOutgoingLetterAction
{
    public static function run(Request $request): void
    {
        $letter = OutgoingLetter::create([
            'date' => $request['date'],
            'number' => $request['number'],
            'recipient' => $request['sender'],
            'street' => $request['street'],
            'city' => $request['city'],
            'code' => $request['code'],
            'country' => $request['country'],
            'user_id' => auth()->user()->id,
        ]);
    }
}
