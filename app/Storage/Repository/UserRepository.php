<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\Contract\UserEntityInterface;

/**
 * Class UserRepository.
 *
 * @package Convene\Storage\Repository
 */
class UserRepository extends Repository implements Contract\UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param \Convene\Storage\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(UserEntityInterface $entity)
    {
        $this->setModel($entity);
    }

    /**
     * Find a user entity using the user's email address.
     *
     * @param string $email
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingEmail(string $email): ?UserEntityInterface
    {
        return $this->builder()->where('email', $email)->first();
    }

    /**
     * Find a user entity using the user's remember token.
     *
     * @param string $token
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRememberToken(string $token): ?UserEntityInterface
    {
        return $this->builder()->where('remember_token', $token)->first();
    }
}
