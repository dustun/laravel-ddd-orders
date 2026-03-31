<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignUp;

use Spatie\LaravelData\Data;

class SignUpOutput extends Data
{
    public function __construct(
        public readonly string $token
    ) {}
}
