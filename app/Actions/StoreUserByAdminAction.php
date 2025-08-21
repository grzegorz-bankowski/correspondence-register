<?php

namespace App\Actions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreUserByAdminAction
{
    public static function run(Request $request): void
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin' => $request['admin'],
            'last_logged' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
