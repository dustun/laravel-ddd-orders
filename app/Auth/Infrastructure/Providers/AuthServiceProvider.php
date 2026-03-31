<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Providers;

use App\Auth\Domain\Contracts\UserRepositoryInterface;
use App\Auth\Infrastructure\Repositories\EloquentUserRepository;
use App\Shared\Application\Contracts\HasherInterface;
use App\Shared\Services\HasherService;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(HasherInterface::class, HasherService::class);
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }
}
