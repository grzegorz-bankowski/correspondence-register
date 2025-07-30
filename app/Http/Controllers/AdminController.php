<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function add()
    {
        if ((Auth::check() && (auth()->user()->admin == 'yes'))) {
            return view('user/add');
        }
            return redirect()->back()->with('denied', 'You must login before go there!');
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->validate([
            'name' => 'required|max:60',
            'email' => 'required|max:60',
            'password' => 'required|Min:8',
        ])) {
            $data = $request->all();
            $this->create($data);
            return redirect()->intended('user/add')->with(
                'message', 'The user account has been created!'
            );
        } else {
            back()->withErrors()->withInput();
        }
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin' => $data['admin'],
            'last_logged' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}