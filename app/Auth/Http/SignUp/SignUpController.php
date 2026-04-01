<?php

declare(strict_types=1);

namespace App\Auth\Http\SignUp;

use App\Auth\Application\UseCases\SignUp\SignUpHandler;
use App\Auth\Application\UseCases\SignUp\SignUpInput;

class SignUpController
{
    /**
     * Регистрация нового пользователя
     *
     * @bodyParam name string required Имя пользователя. Example: Иван Иванов
     * @bodyParam email string required Email адрес. Example: ivan@example.com
     * @bodyParam password string required Пароль. Example: password123
     * @bodyParam password_confirmation string required Подтверждение пароля. Example: password123
     */
    public function __invoke(
        SignUpInput   $input,
        SignUpHandler $handler
    ): SignUpResponse {
        $response = $handler->handle($input);

        return SignUpResponse::make($response);
    }
}
