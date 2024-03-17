<?php

namespace App\Services;

use App\Mail\ReceivedPayment;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendNotificationMail(array $data): void
    {
        Mail::to($data['payee']['email'])->send(new ReceivedPayment($data));
    }
}
