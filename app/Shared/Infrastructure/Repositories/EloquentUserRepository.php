<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Auth\Domain\Entities\User;
use App\Auth\Domain\ValueObjects\Email;
use App\Models\User as EloquentUser;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function save(User $user): void
    {
        if ($user->id) {
            $eloquentUser = EloquentUser::find($user->id);
            $eloquentUser->update([
                'name' => $user->name,
                'email' => $user->email->value,
                'password' => Hash::make($user->password->value),
            ]);
        } else {
            $eloquentUser = EloquentUser::create([
                'name' => $user->name,
                'email' => $user->email->value,
                'password' => Hash::make($user->password->value),
            ]);
        }
    }

    public function findByEmail(Email $email): ?User
    {
        $eloquentUser = EloquentUser::where('email', $email->value)->first();

        if (!$eloquentUser) {
            return null;
        }

        return new User(
            $eloquentUser->id,
            $eloquentUser->name,
            new Email($eloquentUser->email),
            null // Password not loaded
        );
    }

    public function findById(int $id): ?User
    {
        $eloquentUser = EloquentUser::find($id);

        if (!$eloquentUser) {
            return null;
        }

        return new User(
            $eloquentUser->id,
            $eloquentUser->name,
            new Email($eloquentUser->email),
            null // Password not loaded
        );
    }
}
