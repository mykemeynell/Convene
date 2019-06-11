<?php

namespace Convene\Storage\Entity\Contract;

use Carbon\Carbon;

/**
 * Interface UserEntityInterface.
 *
 * @property string          $first_name
 * @property string          $last_name
 * @property string          $email
 * @property string          $username
 * @property \Carbon\Carbon  $email_verified_at
 * @property string          $password
 * @property string          $role_id
 * @property int             $is_root
 * @property int             $is_active
 * @property string          $remember_token
 * @property \Carbon\Carbon  $created_at
 * @property \Carbon\Carbon  $updated_at
 *
 * @package Convene\Storage\Entity\Contract
 */
interface UserEntityInterface
{
    /**
     * Get the display name of the user.
     *
     * @return string
     */
    public function getDisplayName(): string;

    /**
     * Get the first name of the user.
     *
     * @return string
     */
    public function getFirstName(): string;

    /**
     * Get the last name of the user.
     *
     * @return string
     */
    public function getLastName(): string;

    /**
     * Get the first initial of the user.
     *
     * @return string
     */
    public function getFirstInitial(): string;

    /**
     * Get the last initial of the user.
     *
     * @return string
     */
    public function getLastInitial(): string;

    /**
     * Get the user's email address.
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Get the user's username.
     *
     * @return null|string
     */
    public function getUsername(): ?string;

    /**
     * Get the date and time that an email address was verified.
     *
     * @return \Carbon\Carbon|null
     */
    public function getEmailVerifiedAt(): ?Carbon;

    /**
     * Test if users email is verified.
     *
     * @return bool
     */
    public function isEmailVerified(): bool;

    /**
     * Test if the user is root.
     *
     * @return bool
     */
    public function isRoot(): bool;

    /**
     * Test if the user is active.
     *
     * @return bool
     */
    public function isActive(): bool;
}
