<?php

declare(strict_types=1);

namespace App\Auth\Application\UseCases\SignUp;

use App\Auth\Domain\Contracts\UserRepositoryInterface;
use App\Auth\Domain\Entities\User;
use App\Auth\Domain\Events\UserRegistered;
use App\Shared\Services\HasherService;
use App\Shared\ValueObjects\Email;
use App\Shared\ValueObjects\Password;
use App\Shared\ValueObjects\UUID;
use DomainException;
use Illuminate\Support\Facades\Event;

readonly class SignUpHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private HasherService $hasherService,
    ) {}

    public function handle(SignUpInput $data): SignUpOutput
    {
        $email = new Email($data->email);

        if ($this->userRepository->byEmail($email)) {
            throw new DomainException('Пользователь с таким email уже существует!');
        }

        $domainUser = new User(
            id: UUID::generate(),
            name: $data->name,
            email: $email,
            password: new Password(
                $this->hasherService
                    ->hash(
                        $data->password
                    )
            ),
        );

        $this->userRepository->save($domainUser);

        $eloquentUser = $this->userRepository->byId($domainUser->id->value());

        Event::dispatch(new UserRegistered($eloquentUser));

        $token = $eloquentUser->createToken('auth_token')->plainTextToken;

        return new SignUpOutput(
            token: $token,
        );
    }
}
