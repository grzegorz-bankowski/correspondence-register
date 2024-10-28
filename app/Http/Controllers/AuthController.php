<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Incoming_letter;
use App\Models\Outgoing_letter;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function postLogin (Request $request): RedirectResponse
    {

        if(Auth::attempt(['login' => $request['login'], 'password' => $request['password']]))
        {
             return redirect()->intended('incoming_post');
        }
            return back()->withErrors([
                'login' => 'Nieprawidłowe dane logowania'
            ])->withInput();
    }

    public function incomingPost() 
    {
         if (Auth::check())
        {
            return view('incoming');
        }
        return Redirect::to("/")->with('denied', 'You must login before go there!');
    }

    public function outgoingPost() 
    {
        if (Auth::check())
        {
            return view('outgoing');
        }
        return Redirect::to("/")->with('denied', 'You must login before go there!');
    }

    public function browseIncoming() 
    {
        if (Auth::check())
        {
            $letters = Incoming_letter::paginate(5);
            return view('browse_incoming', compact('letters'));
        }
        return Redirect::to("/")->with('denied', 'You must login before go there!');
    }

    public function browseOutgoing() 
    {
        if (Auth::check())
        {
            $letters = Outgoing_letter::paginate(5);
            return view('browse_outgoing', compact('letters'));
        }
        return Redirect::to("/")->with('denied', 'You must login before go there!');
    }

    public function addIncoming (Request $request): RedirectResponse
    {
        $request->validate(
            [
                'date' => 'required',
                'number' => 'required',
                'name' => 'required',
                'street' => 'required',
                'house' => 'required',
                'city' => 'required',
                'code' => 'required',
                'post' => 'required'
            ]
        );

        $data = $request->all();
        $this->create_incoming($data);
        return redirect()->intended('incoming_post')->with([
            'message' => 'The letter has been added!'
        ]);
    }

    public function create_incoming(array $data)
    {
        return Incoming_letter::create([
        'incoming_date' => $data['date'],
        'letter_num' => $data['number'],
        'sender_name' => $data['name'],
        'street' => $data['street'],
        'house_num' => $data['house'],
        'city' => $data['city'],
        'post_code' => $data['code'],
        'post' => $data['post'],
        'user_id' => Auth::id()
        ]);
    }

    public function addOutgoing (Request $request): RedirectResponse
    {
        $request->validate(
            [
                'date' => 'required',
                'number' => 'required',
                'name' => 'required',
                'street' => 'required',
                'house' => 'required',
                'city' => 'required',
                'code' => 'required',
                'post' => 'required'
            ]
        );

        $data = $request->all();
        $this->create_outgoing($data);
        return redirect()->intended('outgoing_post')->with([
            'message' => 'The letter has been added!'
        ]);
    }

    public function create_outgoing(array $data)
    {
        return Outgoing_letter::create([
        'send_date' => $data['date'],
        'letter_num' => $data['number'],
        'recipient' => $data['name'],
        'street' => $data['street'],
        'house_num' => $data['house'],
        'city' => $data['city'],
        'post_code' => $data['code'],
        'post' => $data['post'],
        'user_id' => Auth::id()
        ]);
    }

    public function addUser()
    {

        if ((Auth::check() && (auth()->user()->admin == 'yes')))
       {
           return view('add_user');
       }
       return Redirect::to("/")->with('denied', 'You must login before go there!');
   }

    public function createUser(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => 'required|max:60',
                'login' => 'required|max:30',
                'password' => 'required|Min:6',
                'admin' => 'required|in:yes,no'
            ]
        );
        $data = $request->all();
        $this->create_user($data);
        return redirect()->intended('add_user')->with([
            'message' => 'The user has been added!'
        ]);
    }

    public function create_user(array $data)
    {
        return User::create([
            'full_name' => $data['name'],
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'admin' => $data['admin'],
            'last_logged' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}