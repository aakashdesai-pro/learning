<?php

namespace App\Listeners;

use App\Events\SendOtpForLogin;
use App\Events\SendOtpForRegistration;
use App\Events\SendOtpToForgotPassword;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSms
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendOtpForLogin|SendOtpForRegistration|SendOtpToForgotPassword $event): void
    {
        $url = "https://www.fast2sms.com/dev/bulkV2";

        $headers = [
            "authorization" => config('fast2sms.auth_key'),
            "Content-Type" => "application/json"
        ];

        $body = [
            "route" => "dlt",
            "sender_id" => "123",
            "message" => $event->message,
            "numbers" => $event->mobile,
        ];

        $response = Http::withHeaders($headers)->post($url, $body);
        
        if (!$response->ok()) {
            info('SendSms not working:'.$event->mobile);
        }
    }
}
