<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    public function sendMessage($receiver, $message = '')
    {
        $finalMessage = $message ?? "Test";

        $response = Http::get(config('sms.base_url'), [
            'api_key' => config('sms.api_key'),
            'type' => 'text',
            'number' => $receiver,
            'senderid' => config('sms.sender'),
            'message' => $finalMessage,
        ]);

        return $response->json();
    }
}