<?php

namespace App\Actions;
use App\Models\IncomingLetter;
use Illuminate\Http\Request;

class DeleteIncomingLetterAction
{
    public static function run(Request $request): void
    {
        IncomingLetter::findOrFail($request->id)->delete();
    }
}
