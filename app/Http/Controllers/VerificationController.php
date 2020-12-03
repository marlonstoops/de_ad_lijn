<?php

namespace App\Http\Controllers;

use App\Http\MobileVerificationRequest;

class VerificationController extends Controller
{
    public function notice()
    {
        if (\Auth::user() && \Auth::user()->hasVerifiedMobile()) {
            return redirect()->route('dashboard');
        }

        return view('auth.verify-mobile');
    }

    public function verify(MobileVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }
}
