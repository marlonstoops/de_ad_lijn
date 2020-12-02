<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function verifyPhone()
    {
        return view('verify-phone');
    }
}
