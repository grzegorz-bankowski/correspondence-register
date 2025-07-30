<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IncomingLetterController extends Controller
{
    public function add() 
    {
        if (Auth::check()) {
            return view('incoming/add');
        }
            return redirect("/")->with('denied', 'You must login before go there!');
    }

    public function browse() 
    {
        if (Auth::check()) {
            $letters = IncomingLetter::paginate(5);
            return view('incoming/browse', compact('letters'));
        }
        return redirect("/")->with('denied', 'You must login before go there!');
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->validate([
            'date' => 'required',
            'number' => 'required',
            'sender' => 'required',
            'street' => 'required',
            'city' => 'required',
            'code' => 'required',
        ])) {
            $data = $request->all();
            $this->create($data);
            return redirect()->intended('incoming/add')->with(['message' => 'The letter has been added!']);
        } else {
            back()->withErrors()->withInput();
        }
    }

    public function create(array $data)
    {
        return IncomingLetter::create([
            'date' => $data['date'],
            'number' => $data['number'],
            'sender' => $data['sender'],
            'street' => $data['street'],
            'city' => $data['city'],
            'code' => $data['code'],
            'country' => $data['country'],
            'user_id' => Auth::id()
        ]);
    }
}
