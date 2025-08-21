<?php

namespace App\Http\Controllers;

use App\Actions\StoreIncomingLetterAction;
use App\Http\Requests\StoreIncomingLetterRequest;
use App\Http\Requests\AddIncomingLetterRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BrowseIncomingLettersRequest;
use App\Models\IncomingLetter;
use App\Http\Requests\EditIncomingLetterRequest;

class IncomingLetterController extends Controller
{
    public function add(AddIncomingLetterRequest $request)
    {
        return view('incoming/add');
    }

    public function store(StoreIncomingLetterRequest $request, StoreIncomingLetterAction $storeIncomingLetterAction): RedirectResponse
    {
        $storeIncomingLetterAction->run($request);
        return redirect()->intended('incoming/add')->with([
            'message', 'The letter has been added!'
        ]);
    }

    public function browse(BrowseIncomingLettersRequest $request)
    {
        $letters = IncomingLetter::paginate(5);
        return view('incoming/browse', compact('letters'));
    }

    public function edit($id, EditIncomingLetterRequest $request)
    {
        $letter = IncomingLetter::findOrFail($id);
        return view('incoming/edit', compact('letter'));
    }
}
