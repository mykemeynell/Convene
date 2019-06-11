<?php

namespace Convene\Storage\Entity;

use ArchLayer\Entity\Concern\EntityHasTimestamps;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use UuidColumn\Concern\HasUuidObserver;

/**
 * Class UserEntity.
 *
 * @package Convene\Storage\Entity
 */
class UserEntity extends Authenticatable implements Contract\UserEntityInterface
{
    use Notifiable, EntityHasTimestamps, HasUuidObserver;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'username', 'email_verified_at', 'password', 'role_id', 'is_root',
        'is_active', 'remember_token',];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['remember_token', 'password', 'role_id',];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['remember_token', 'password',];

    /**
     * Get the display name of the user.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return "{$this->getFirstName()} {$this->getLastName()}";
    }

    /**
     * Get the first name of the user.
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return ucwords($this->first_name);
    }

    /**
     * Get the last name of the user.
     *
     * @return string
     */
    public function getLastName(): string
    {
        return ucwords($this->last_name);
    }

    /**
     * Get the first initial of the user.
     *
     * @return string
     */
    public function getFirstInitial(): string
    {
        return substr($this->getFirstName(), 0, 1);
    }

    /**
     * Get the last initial of the user.
     *
     * @return string
     */
    public function getLastInitial(): string
    {
        return substr($this->getLastName(), 0, 1);
    }

    /**
     * Get the user's email address.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the user's username.
     *
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Get the date and time that an email address was verified.
     *
     * @return \Carbon\Carbon|null
     */
    public function getEmailVerifiedAt(): Carbon
    {
        return $this->email_verified_at;
    }

    /**
     * Test if users email is verified.
     *
     * @return bool
     */
    public function isEmailVerified(): bool
    {
        return ! empty($this->email_verified_at);
    }

    /**
     * Test if the user is root.
     *
     * @return bool
     */
    public function isRoot(): bool
    {
        return $this->is_root;
    }

    /**
     * Test if the user is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

    /**
     * Encrypt the password value prior to setting.
     *
     * @param $value
     *
     * @return void
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
