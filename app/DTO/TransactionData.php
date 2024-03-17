<?php

namespace App\DTO;

use Modules\User\App\DTO\UserData;
use Spatie\LaravelData\Data;

class TransactionData extends Data
{
    public function __construct(
        public string $id,
        public UserData $payer,
        public UserData $payee,
        public float $value,
        public string $status,
    ) {}
}
