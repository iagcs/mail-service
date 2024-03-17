<?php

namespace App\Jobs;

use App\DTO\TransactionData;
use App\Services\MailService;

class SendMailPaymentReceivedJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public array $data) {}


    public function handle(MailService $service): void
    {
        $service->sendNotificationMail($this->data);
    }
}
