<?php

declare(strict_types=1);

namespace App\Auth\Http\SignIn;

use App\Auth\Application\UseCases\SignIn\SignInOutput;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin SignInOutput */
class SignInResponse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'token' => $this->token,
        ];
    }
}
