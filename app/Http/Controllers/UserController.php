<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->intended('incoming/add');
        } else {
            return back()->withErrors(['message' => 'Login data inccorect'])->withInput([
                'email' => $request['email'],
            ]);
        }
    }

    public function create()
    {
        return view('account.create');
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->validate(
            [
                'name' => 'required|max:60',
                'email' => 'required|max:60',
                'password' => 'required|Min:8',
            ]
        )) {
            $data = $request->all();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'admin' => $data['admin'],
                'last_logged' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            Auth::login($user);
            return redirect()->intended('incoming/add')->with(
                'message', 'The user account has been created!'
            );
        } else {
            back()->withErrors()->withInput();
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
