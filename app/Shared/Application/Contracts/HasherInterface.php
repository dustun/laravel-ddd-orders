<?php

declare(strict_types=1);

namespace App\Shared\Application\Contracts;

interface HasherInterface
{
    public function hash(string $plain);

    public function verify(string $plain, string $hashed);
}
