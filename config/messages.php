<?php

return [
    1 => '<Response>
                <Pause length="1"/>
                <Say voice="alice" language="nl-NL">
                    Hallo :receiver_name:, dit is de ad lijn.
                    Jij moet nu 1 ad fundum drinken. :sender_name: heeft je geadlijnd.
                    Maak een account op www.adlijn.be om zelf te adlijnen.
                </Say>
            </Response>',
    2 => '
        <?xml version="1.0" encoding="UTF-8"?>
        <Response>
            <Pause length="1"/>
            <Play>http://demo.twilio.com/docs/classic.mp3</Play>
        </Response>',
];
