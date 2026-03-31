<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignIn;

use App\Shared\DTO\Input;
use Spatie\LaravelData\Attributes\Validation\Confirmed;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;

class SignInInput extends Input
{
    public function __construct(
        #[Required, Max(255)]
        public readonly string $name,
        #[Required, Max(255)]
        public readonly string $email,
        #[Required, Max(255), Confirmed]
        public readonly string $password
    ) {}
}
