<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignIn;

use App\Auth\Domain\Contracts\UserRepositoryInterface;
use App\Shared\Services\HasherService;
use App\Shared\ValueObjects\Email;
use DomainException;

readonly class SignInHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private HasherService $hasherService,
    ) {}

    public function handle(
        SignInInput $data
    ): SignInOutput
    {
        $email = new Email($data->email);

        $eloquentUser = $this->userRepository->byEmail($email);

        if (!$eloquentUser) {
            throw new DomainException('Неверный email или пароль');
        }

        if (!$this->hasherService->verify($data->password, $eloquentUser->password)) {
            throw new DomainException('Неверный email или пароль');
        }

        $token = $eloquentUser->createToken('auth_token')->plainTextToken;

        return new SignInOutput(
            token: $token,
        );
    }
}
