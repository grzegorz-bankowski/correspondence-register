<?php

namespace App\Actions;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class UpdateOutgoingLetterAction
{
    public static function run(Request $request): void
    {
        $letter = OutgoingLetter::findOrFail($request->id);
        $letter->update($request->all());
    }
}
