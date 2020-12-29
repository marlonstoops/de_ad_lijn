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
                <Say voice="alice">Thanks for trying our documentation. Enjoy!</Say>
                <Play>http://demo.twilio.com/docs/classic.mp3</Play>
            </Response>
        ';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
