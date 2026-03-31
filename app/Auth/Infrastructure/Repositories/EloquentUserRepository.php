<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Repositories;

use App\Auth\Domain\Contracts\UserRepositoryInterface;
use App\Auth\Domain\Entities\User as DomainUser;
use App\Auth\Infrastructure\Models\EloquentUser;
use App\Shared\ValueObjects\Email;
use App\Shared\ValueObjects\Password;
use App\Shared\ValueObjects\UUID;

final class EloquentUserRepository implements UserRepositoryInterface
{
    public function byId(int $id): ?DomainUser
    {
        $eloquentUser = EloquentUser::query()
            ->find($id);

        return $eloquentUser ? $this->toDomain($eloquentUser) : null;
    }

    public function byEmail(Email $email): ?DomainUser
    {
        $eloquentUser = EloquentUser::query()
            ->where('email', $email->value())
            ->first();

        return $eloquentUser ? $this->toDomain($eloquentUser) : null;
    }

    public function save(DomainUser $user): bool
    {
        $eloquentUser = new EloquentUser();

        $eloquentUser->id       = $user->id->value();
        $eloquentUser->name     = $user->name;
        $eloquentUser->email    = $user->email->value();
        $eloquentUser->password = $user->password->value();

        return $eloquentUser->save();
    }

    private function toDomain(EloquentUser $user): DomainUser
    {
        return new DomainUser(
            id: new UUID($user->id),
            name: $user->name,
            email: new Email($user->email),
            password: new Password($user->password),                    // пароль не загружаем в Entity
        );
    }
}
