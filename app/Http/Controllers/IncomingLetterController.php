<?php

namespace App\Http\Controllers;

use App\Actions\StoreIncomingLetterAction;
use App\Http\Requests\StoreIncomingLetterRequest;
use App\Http\Requests\AddIncomingLetterRequest;
use Illuminate\Http\RedirectResponse;

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
}
