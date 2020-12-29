<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // Check if called user is a registered user
        $calledUser = User::where('mobile', $adlijn->mobile)->first();

        // If so reset the user's credits
        if ($calledUser) {
            $calledUser->credit = 4;
            $calledUser->save();
        }

        $this->call($adlijn);

        return redirect()->route('dashboard');

    }

    private function call($adlijn) {
        if (config('app.debug')) {
            \Log::info(sprintf('Called user %s (%s)', $adlijn->name, $adlijn->mobile));

            return;
        }

        // Use the client to do fun stuff like send text messages!
        $this->client->calls->create(
            // the number you'd like to send the message to
            $adlijn->mobile,
            config('twilio.number'),
            [
                'url' => route('xml', [1, 'name' => $adlijn->name]),
                'method' => 'get',
            ]
        );
    }
}
