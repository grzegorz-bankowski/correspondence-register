<?php

namespace App\Actions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreUserByGuestAction
{
    public static function run(Request $request): void
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin' => 'no',
            'last_logged' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Auth::login($user);
    }
}
