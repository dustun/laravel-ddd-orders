<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignUp;

use App\Auth\Domain\Contracts\UserRepositoryInterface;
use App\Auth\Domain\Entities\User;
use App\Auth\Infrastructure\Models\EloquentUser;
use App\Shared\Services\HasherService;
use App\Shared\ValueObjects\Email;
use App\Shared\ValueObjects\Password;
use App\Shared\ValueObjects\UUID;
use DomainException;

readonly class SignUpHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private HasherService           $hasherService,
    ) {}

    public function handle(
        SignUpInput $data
    ): SignUpOutput {
        $user = new User(
            id: UUID::generate(),
            name: $data->name,
            email: new Email($data->email),
            password: new Password(
                $this->hasherService->hash(
                    $data->password
                )
            ),
        );

        if ($this->userRepository->byEmail($user->email)) {
            throw new DomainException('Пользователь с таким email уже существует!');
        }

        $this->userRepository->save($user);

        $eloquentUser = EloquentUser::query()->findOrFail($user->id->value());
        $token = $eloquentUser->createToken('auth_token')->plainTextToken;

        return new SignUpOutput(
            token: $token,
        );
    }
}
