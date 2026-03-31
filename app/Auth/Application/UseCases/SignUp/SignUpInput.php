<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignUp;

use Spatie\LaravelData\Attributes\Validation\Confirmed;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class SignUpInput extends Data
{
    public function __construct(
        #[Required, Max(255), StringType]
        public readonly string $name,
        #[Required, Max(255), Email, StringType]
        public readonly string $email,
        #[Required, Max(255), Confirmed, StringType]
        public readonly string $password,
    ) {}
}
