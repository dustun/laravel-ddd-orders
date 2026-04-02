<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Jobs;

use App\Auth\Infrastructure\Mail\VerifyEmailMail;
use App\Auth\Infrastructure\Models\EloquentUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmailJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly EloquentUser $user
    ) {}

    public function handle(): void
    {
        Mail::to($this->user->email)
            ->send(new VerifyEmailMail($this->user));
    }
}

