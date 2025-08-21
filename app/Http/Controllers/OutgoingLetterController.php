<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Actions\StoreOutgoingLetterAction;
use App\Http\Requests\AddOutgoingLetterRequest;
use App\Http\Requests\StoreOutgoingLetterRequest;
use App\Models\OutgoingLetter;
use App\Http\Requests\BrowseOutgoingLettersRequest;

class OutgoingLetterController extends Controller
{
    public function add(AddOutgoingLetterRequest $request)
    {
        return view('outgoing/add');
    }

    public function store(StoreOutgoingLetterRequest $request, StoreOutgoingLetterAction $storeOutgoingLetterAction): RedirectResponse
    {
        $storeOutgoingLetterAction->run($request);
        return redirect()->intended('outgoing/add')->with([
            'message' => 'The letter has been added!'
        ]);
    }

    public function browse(BrowseOutgoingLettersRequest $request)
    {
        $letters = OutgoingLetter::paginate(5);
        return view('outgoing/browse', compact('letters'));
    }
}
