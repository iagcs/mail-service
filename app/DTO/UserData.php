<?php

namespace Modules\User\App\DTO;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public string $document,
        public string $email,
        public string $password,
        public string $type
    ) {}
}
