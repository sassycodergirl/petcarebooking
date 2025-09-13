<?php

namespace App\Helpers;

use Twilio\Rest\Client;

class TwilioHelper
{
      public static function sendWhatsApp($to, $message)
    {
        $sid   = env('TWILIO_SID');        // Your Twilio Account SID
        $token = env('TWILIO_AUTH_TOKEN'); // Your Twilio Auth Token
        $from  = env('TWILIO_WHATSAPP_FROM'); // E.g. 'whatsapp:+14155238886'

        $twilio = new Client($sid, $token);

        return $twilio->messages->create(
            "whatsapp:{$to}", // Recipient
            [
                "from" => $from,
                "body" => $message,
            ]
        );
    }
}
