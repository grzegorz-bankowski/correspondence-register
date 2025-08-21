<?php

namespace App\Http\Controllers;

class ForgetPasswordController extends Controller
{
    public function forgetPasswordForm()
    {
        return view('forget.password');
    }
}
