<?php

namespace App\Http\Controllers;

use App\Models\AdLijn;

class XmlController extends Controller
{
    public function index($id)
    {
        $adlijn = AdLijn::findOrFail($id);

        $data = [
            ':receiver_name:' => $adlijn->name,
            ':sender_name:'   => $adlijn->user->name,
        ];

        $message = config('messages.' . $adlijn->message_id);

        if (! $message) {
            return abort(404);
        }

        $xml = str_replace(array_keys($data), $data, $message);

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
