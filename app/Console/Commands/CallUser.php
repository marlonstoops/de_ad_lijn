<?php

namespace App\Console\Commands;

use Twilio\Rest\Client;
use Illuminate\Console\Command;

class CallUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:call {mobile}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call a user';

    // TWILIO client
    protected $client;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $id    = config('twilio.id');
        $token = config('twilio.token');

        if ($id && $token) {
            $this->client = new Client($id, $token);
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (! $this->client) {
            return;
        }

        $mobile = $this->argument('mobile');

        // Use the client to do fun stuff like send text messages!
        $this->client->calls->create(
            // the number you'd like to send the message to
            $mobile,
            config('twilio.number'),
            [
                'url'    => 'http://77.243.238.175:8080/default.xml',

                // 'url'    => route('xml', ['id' => 1]),
                'method' => 'get',
            ]
        );
    }
}
