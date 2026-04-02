<?php

declare(strict_types=1);

use App\Auth\Http\SignIn\SignInController;
use App\Auth\Http\SignUp\SignUpController;
use App\Auth\Http\Verification\EmailVerificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('sign-up', SignUpController::class)
            ->name('auth.sign-up');
        Route::post('sign-in', SignInController::class)
            ->name('auth.sign-in');
    });

    Route::prefix('email')->group(function () {

        Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
            ->middleware('signed')
            ->name('verification.verify');

        Route::post('resend', [EmailVerificationController::class, 'resend'])
            ->middleware('auth:sanctum')
            ->name('verification.send');
    });
});
