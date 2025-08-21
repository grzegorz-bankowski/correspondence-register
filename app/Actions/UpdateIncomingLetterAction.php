<?php

namespace App\Actions;
use App\Models\IncomingLetter;
use Illuminate\Http\Request;

class UpdateIncomingLetterAction
{
    public static function run(Request $request): void
    {
        $letter = IncomingLetter::findOrFail($request->id);
        $letter->update($request->all());
    }
}
