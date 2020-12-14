<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        if (\Auth::user()) {
            return redirect()->route('dashboard');
        }

        return view('welcome');
    }

    public function verifyPhone()
    {
        return view('verify-phone');
    }
}
