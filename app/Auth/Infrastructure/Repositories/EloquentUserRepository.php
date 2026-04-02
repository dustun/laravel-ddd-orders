<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Repositories;

use App\Auth\Domain\Contracts\UserRepositoryInterface;
use App\Auth\Domain\Entities\User as DomainUser;
use App\Auth\Infrastructure\Models\EloquentUser;
use App\Shared\ValueObjects\Email;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function byId(string $id): ?EloquentUser
    {
        return EloquentUser::query()->find($id);
    }

    public function byEmail(Email $email): ?EloquentUser
    {
        return EloquentUser::query()
            ->where('email', $email->value())
            ->first();
    }

    public function save(DomainUser $user): void
    {
        $eloquentUser = new EloquentUser();

        $eloquentUser->id                = $user->id->value();
        $eloquentUser->name              = $user->name;
        $eloquentUser->email             = $user->email->value();
        $eloquentUser->password          = $user->password->value();
        $eloquentUser->email_verified_at = $user->emailVerifiedAt?->format('Y-m-d H:i:s');

        $eloquentUser->save();
    }
}
