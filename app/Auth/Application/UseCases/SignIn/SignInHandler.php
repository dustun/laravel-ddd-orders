<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignIn;

use App\Infrastructure\Repositories\UserRepositoryInterface;
use App\Shared\ValueObjects\Email;
use App\Shared\ValueObjects\Password;
use Exception;

readonly class SignInHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {}

    public function handle(SignInInput $data): void
    {
        $email = new Email($data->email);
        $password = new Password($data->password);

        if ($this->userRepository->findByEmail($email)) {
            throw new Exception('Email already exists');
        }

        $this->userRepository->save($user);
    }
}
