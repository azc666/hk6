<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Password;

class ForgotPasswordController extends Controller
{
    //Sends Password Reset emails
    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
{
        $this->validate($request, ['username' => 'required'], ['username.required' => 'Please enter your username.']);

         $response = $this->broker()->sendResetLink(
            $request->only('username')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
}

    public function __construct()
    {
        $this->middleware('guest');
    }
}
