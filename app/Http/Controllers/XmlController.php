<?php

namespace App\Http\Controllers;

use App\Models\AdLijn;

class XmlController extends Controller
{
    public function index($id)
    {
        $adlijn = AdLijn::findOrFail($id);

        $xml = '
            <Response>
                <Say voice="alice" language="nl-NL">
                    Hallo ' . $adlijn->name . ', dit is de ad lijn.
                    Jij moet nu 1 ad fundum drinken. '
                    . $adlijn->user->name . ' heeft je geadlijnd.
                    Maak een account op www.adlijn.be om zelf te adlijnen.
                </Say>
            </Response>
        ';

        $adlijn->delete();

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function callback()
    {
        $xml = '
            <Response>
                <Say voice="alice">
                    Thanks for the call. Visit www.adlijn.be for more information.
                </Say>
            </Response>
        ';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
