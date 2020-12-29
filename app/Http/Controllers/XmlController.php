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

    public function callback()
    {
        $xml = '
            <Response>
                <Say voice="alice">
                    Thanks for the call. Configure your number\'s voice U R L to change this message.
                </Say>

                <Pause length="1"/>

                <Say voice="alice">
                    Let us know if we can help you in any way during your development.
                </Say>
            </Response>
        ';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
