<?php

use App\Auth\Infrastructure\Providers\AuthServiceProvider;
use App\Infrastructure\Providers\AppServiceProvider;
use App\Infrastructure\Providers\EventServiceProvider;

return [
    AppServiceProvider::class,
    AuthServiceProvider::class,
    EventServiceProvider::class
];
