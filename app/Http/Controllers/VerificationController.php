<?php

namespace App\Http\Controllers;

class VerificationController extends Controller
{
    public function verify()
    {
        if (\Auth::user() && \Auth::user()->hasVerifiedMobile()) {
            return redirect()->route('dashboard');
        }

        return view('auth.verify-mobile');
    }
}
