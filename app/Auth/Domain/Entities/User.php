<?php

declare(strict_types=1);

namespace App\Auth\Domain\Entities;

use App\Shared\ValueObjects\Email;
use App\Shared\ValueObjects\Password;
use App\Shared\ValueObjects\UUID;

class User
{
    public function __construct(
        public UUID     $id,
        public string   $name,
        public Email    $email,
        public Password $password,
    ) {}
}
