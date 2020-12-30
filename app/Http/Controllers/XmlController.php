<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlController extends Controller
{
    public function index($id, Request $request)
    {
        $name = $request->get('name');

        $xml = '
            <Response>
                <Say voice="alice" language="nl-NL">Hallo ' . $name . ', dit is de ad lijn. Jij moet nu 1 ad fundum drinken.</Say>
            </Response>
        ';

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
