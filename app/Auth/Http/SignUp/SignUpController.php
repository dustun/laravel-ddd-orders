<?php

declare(strict_types=1);

namespace App\Auth\Http\SignUp;

use App\Auth\Application\UseCases\SignUp\SignUpHandler;
use App\Auth\Application\UseCases\SignUp\SignUpInput;

class SignUpController
{
    public function __invoke(
        SignUpInput   $input,
        SignUpHandler $handler
    ): SignUpResponse {
        $response = $handler->handle($input);

        return SignUpResponse::make($response);
    }
}
