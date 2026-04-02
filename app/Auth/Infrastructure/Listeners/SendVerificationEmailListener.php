<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Listeners;

use App\Auth\Domain\Events\UserRegistered;
use App\Auth\Infrastructure\Jobs\SendVerificationEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerificationEmailListener implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        SendVerificationEmailJob::dispatch($event->user);
    }
}

