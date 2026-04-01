<?php

declare(strict_types=1);

namespace App\Auth\Domain\Contracts;

use App\Auth\Domain\Entities\User;
use App\Shared\ValueObjects\Email;

interface UserRepositoryInterface
{
    public function byId(int $id): ?User;
    public function byEmail(Email $email): ?User;
    public function save(User $user);
}
