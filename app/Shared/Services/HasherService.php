<?php

declare(strict_types=1);

namespace App\Shared\Services;

use App\Shared\Application\Contracts\HasherInterface;
use Illuminate\Support\Facades\Hash;

class HasherService implements HasherInterface
{
    public function hash(string $plain): string
    {
        return Hash::make($plain);
    }

    public function verify(string $plain, string $hashed): bool
    {
        return Hash::check($plain, $hashed);
    }
}
