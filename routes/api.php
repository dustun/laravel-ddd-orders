<?php

declare(strict_types=1);

use App\Auth\Http\SignIn\SignInController;
use App\Auth\Http\SignUp\SignUpController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('auth')->group(function () {
        //        Route::post('sign-in', SignInController::class);
        Route::post('sign-up', SignUpController::class);

        Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();
        })
            ->middleware(['auth:sanctum', 'signed'])
            ->name('verification.verify');
    });
});
