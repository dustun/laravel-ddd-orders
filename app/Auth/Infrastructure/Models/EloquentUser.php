<?php

declare(strict_types=1);

namespace App\Auth\Infrastructure\Models;

use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class EloquentUser
 *
 * @property string $id
 * @property string $email
 * @property string $name
 * @property string $password
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class EloquentUser extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use Notifiable;
    use MustVerifyEmailTrait;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'users';

    protected $fillable = [
        'id',
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
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];
}
