<?php

namespace Convene\Storage\Repository\Contract;

use ArchLayer\Repository\RepositoryInterface;
use Convene\Storage\Entity\Contract\UserEntityInterface;

/**
 * Interface UserRepositoryInterface.
 *
 * @package Convene\Storage\Repository\Contract
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a user entity using the user's email address.
     *
     * @param string $email
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface|null
     */
    public function findUsingEmail(string $email): ?UserEntityInterface;

    /**
     * Find a user entity using the user's remember token.
     *
     * @param string $token
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface|null
     */
    public function findUsingRememberToken(string $token): ?UserEntityInterface;
}
