<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OutgoingLetterController extends Controller
{
    public function add()
    {
        if (Auth::check()) {
            return view('outgoing/add');
        }
        return redirect("/")->with('denied', 'You must login before go there!');
    }

    public function browse()
    {
        if (Auth::check()) {
            $letters = OutgoingLetter::paginate(5);
            return view('outgoing/browse', compact('letters'));
        }
        return redirect("/")->with('denied', 'You must login before go there!');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'date' => 'required',
            'number' => 'required',
            'recipient' => 'required',
            'street' => 'required',
            'city' => 'required',
            'code' => 'required',
        ]);

        $data = $request->all();
        $this->create($data);
        return redirect()->intended('outgoing/add')->with([
            'message' => 'The letter has been added!'
        ]);
    }

    public function create(array $data)
    {
        return OutgoingLetter::create([
        'date' => $data['date'],
        'number' => $data['number'],
        'recipient' => $data['recipient'],
        'street' => $data['street'],
        'city' => $data['city'],
        'code' => $data['code'],
        'country' => $data['country'],
        'user_id' => Auth::id()
        ]);
    }
}
