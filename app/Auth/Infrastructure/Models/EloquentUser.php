<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class EloquentUser
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class EloquentUser extends User
{
    use HasApiTokens;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
