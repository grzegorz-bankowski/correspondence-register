<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        if (Gate::allows('guest-request', User::class))
        {
            return view('login');
        } else {
            return redirect()->intended('incoming/add')->with('info', 'You are logged in already!');
        }
    }

    public function login(Request $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->intended('incoming/add');
        } else {
            return back()->withErrors(['message' => 'Login data incorrect'])->withInput([
                'email' => $request['email'],
            ]);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
