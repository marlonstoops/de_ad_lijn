<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\AdLijn;
use App\Http\Requests\AdLijnRequest;

class AdLijnController extends Controller
{
    public function __construct()
    {
        $id    = config('twilio.id');
        $token = config('twilio.token');

        if ($id && $token) {
            $this->client = new Client($id, $token);
        }
    }

    public function post(AdLijnRequest $request)
    {
        \Auth::user()->credit -= 1;
        \Auth::user()->save();

        $adlijn = new AdLijn([
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
        ]);

        \Auth::user()->lijnen()->save($adlijn);

        $this->call($user);

        return redirect()->route('dashboard');

    }

    private function call($user) {
        // Use the client to do fun stuff like send text messages!
        $this->client->calls->create(
            // the number you'd like to send the message to
            $user->mobile,
            config('twilio.number'),
            [
                'url' => url('1.xml'),
                'method' => 'get',
            ]
        );
}
}
