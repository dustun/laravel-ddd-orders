<?php

declare(strict_types=1);

namespace App\Auth\Http\Verification;

use Illuminate\Foundation\Http\FormRequest;

class VerifyEmailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'string'],
            'hash' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

