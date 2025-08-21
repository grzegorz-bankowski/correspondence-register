<?php

namespace App\Actions;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class DeleteOutgoingLetterAction
{
    public static function run(Request $request): void
    {
        OutgoingLetter::findOrFail($request->id)->delete();
    }
}
