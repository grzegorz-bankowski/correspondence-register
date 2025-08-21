<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserByAdminRequest;
use App\Http\Requests\StoreUserByAdminRequest;
use App\Actions\StoreUserByAdminAction;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function add(AddUserByAdminRequest $request)
    {
        return view('user.add');
    }

    public function store(StoreUserByAdminRequest $request, StoreUserByAdminAction $createUserByAdminAction): RedirectResponse
    {
        $createUserByAdminAction->run($request);
        return redirect()->intended('user/add')->with(
            'message', 'The user account has been created!'
        );
    }
}
