<?php

declare(strict_types=1);

namespace App\Auth\Domain\Contracts;

use App\Auth\Domain\Entities\User as DomainUser;
use App\Auth\Infrastructure\Models\EloquentUser;
use App\Shared\ValueObjects\Email;

interface UserRepositoryInterface
{
    public function byId(string $id): ?EloquentUser;
    public function byEmail(Email $email): ?EloquentUser;
    public function save(DomainUser $user): void;
}
