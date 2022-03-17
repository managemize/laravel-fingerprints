<?php

namespace Managemize\LaravelFingerprints\Tests\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Managemize\LaravelFingerprints\Tests\Database\Factories\UserFactory;
use Managemize\LaravelFingerprints\Traits\HasFingerPrints;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasFingerPrints;
    protected $appends = ['scheme_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function password(): Attribute
    {
        return new Attribute(
          set: fn($value) => Hash::make($value)
        );
    }

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
