<?php

declare(strict_types=1);

namespace App\Auth\Http\SignIn;

use App\Auth\Application\UseCases\SignIn\SignInHandler;
use App\Auth\Application\UseCases\SignIn\SignInInput;

class SignInController
{
    public function __invoke(
        SignInInput $data,
        SignInHandler $handler
    ) {
        $response = $handler->handle($data);

        return SignInResponse::make($response);
    }
}
