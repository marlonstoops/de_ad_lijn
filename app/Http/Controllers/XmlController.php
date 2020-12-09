<?php

namespace App\Http\Controllers;

class XmlController extends Controller
{
    public function index($id)
    {
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
