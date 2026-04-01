<?php

declare(strict_types=1);

namespace App\Auth\Application\Listeners;

use App\Auth\Domain\Events\UserRegistered;
use App\Auth\Infrastructure\Mail\VerifyEmailMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

final class SendEmailVerificationListener implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;

        Mail::to($user->email)
            ->queue(new VerifyEmailMail($user));
    }
}
