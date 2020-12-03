<?php

namespace App\Http\Controllers;

use App\Models\AdLijn;
use App\Http\Requests\AdLijnRequest;

class AdLijnController extends Controller
{
    public function post(AdLijnRequest $request)
    {

        \Auth::user()->credit -= 1;
        \Auth::user()->save();

        $adlijn = new AdLijn([
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
        ]);

        \Auth::user()->lijnen()->save($adlijn);

        return redirect()->route('dashboard');

    }
}
