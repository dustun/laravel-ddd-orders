<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Mail;

use App\Auth\Infrastructure\Models\EloquentUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerifyEmailMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly EloquentUser $user
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Подтверждение адреса электронной почты',
        );
    }

    public function content(): Content
    {
        $verificationUrl = URL::temporarySignedRoute(
            name: 'verification.verify',
            expiration: now()->addMinutes(24),
            parameters: [
                'id' => $this->user->getKey(),
                'hash' => sha1($this->user->getEmailForVerification()),
            ]
        );

        return new Content(
            view: 'emails.auth.verify-email',
            with: [
                'user' => $this->user,
                'url'  => $verificationUrl,
            ],
        );
    }
}
