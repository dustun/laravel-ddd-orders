<?php

declare(strict_types=1);

namespace App\Auth\Http\Verification;

use App\Auth\Infrastructure\Models\EloquentUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;

class EmailVerificationController
{
    public function verify(VerifyEmailRequest $request): JsonResponse
    {
        $user = EloquentUser::findOrFail($request->input('id'));

        // Проверяем валидность хэша
        if (!hash_equals(
            sha1($user->getEmailForVerification()),
            $request->input('hash')
        )) {
            return response()->json([
                'message' => 'Ссылка верификации недействительна',
                'success' => false
            ], 422);
        }

        // Проверяем подпись URL
        if (!URL::hasValidSignature($request)) {
            return response()->json([
                'message' => 'Подпись URL недействительна или истекла',
                'success' => false
            ], 422);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email уже подтверждён',
                'success' => false
            ], 422);
        }

        $user->markEmailAsVerified();

        return response()->json([
            'message' => 'Email успешно подтверждён',
            'success' => true
        ]);
    }

//    public function resend(): JsonResponse
//    {
//        $user = auth()->user();
//
//        if (!$user) {
//            return response()->json(['message' => 'Пользователь не авторизован'], 401);
//        }
//
//        if ($user->hasVerifiedEmail()) {
//            return response()->json(['message' => 'Email уже подтверждён'], 400);
//        }
//
//        Mail::to($user->email)
//            ->queue(new VerifyEmailMail($user));
//
//        return response()->json([
//            'message' => 'Письмо с подтверждением отправлено повторно'
//        ]);
//    }
}
