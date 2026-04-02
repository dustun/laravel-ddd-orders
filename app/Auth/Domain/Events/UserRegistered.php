<?php

declare(strict_types=1);

namespace App\Auth\Domain\Events;

use App\Auth\Infrastructure\Models\EloquentUser;

readonly class UserRegistered
{
    public function __construct(
        public EloquentUser $user
    ) {}
}
