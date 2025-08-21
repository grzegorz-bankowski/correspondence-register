<?php

namespace App\Http\Controllers;

use App\Actions\SubmitForgetPasswordFormAction;
use App\Http\Requests\SubmitForgetPasswordFormRequest;
use App\Actions\SubmitResetPasswordFormAction;
use App\Http\Requests\SubmitResetPasswordFormRequest;

class ForgetPasswordController extends Controller
{
    public function forgetPasswordForm()
    {
        return view('forget.password');
    }

    public function submitForgetPasswordForm(SubmitForgetPasswordFormRequest $request, SubmitForgetPasswordFormAction $submitForgetPasswordFormAction)
    {
        $submitForgetPasswordFormAction->run($request);
        return back()->with('message', 'We have sent email with password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('forget.passwordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(SubmitResetPasswordFormRequest $request, SubmitResetPasswordFormAction $submitResetPasswordFormAction)
    {
        $submitResetPasswordFormAction->run($request);
        return redirect('/')->with('message', 'Password has been changed!');
    }
}
