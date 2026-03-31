<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Auth\Domain\Entities\User;
use App\Shared\ValueObjects\Email;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function findByEmail(Email $email): ?User;
    public function findById(int $id): ?User;
}
