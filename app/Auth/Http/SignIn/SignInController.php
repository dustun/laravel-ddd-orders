<?php

declare(strict_types=1);

namespace App\Auth\Http\SignIn;

use App\Auth\Application\UseCases\SignIn\SignInHandler;
use App\Auth\Application\UseCases\SignIn\SignInInput;

class SignInController
{
    public function __invoke(
        SignInHandler $handler
    ) {
        //        $data = new SignInInput(
        //            name: $request->input('name'),
        //            email: $request->input('email'),
        //            password: $request->input('password'),
        //        );

        //        $response = $handler->handle($data);

        //        return SignInResponse::make($response);
    }
}
