<?php

namespace App\Http\Controllers;

use App\Actions\SubmitForgetPasswordFormAction;
use App\Http\Requests\SubmitForgetPasswordFormRequest;

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
}
