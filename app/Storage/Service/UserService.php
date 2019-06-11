<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\UserEntityInterface;
use Convene\Storage\Repository\Contract\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class UserService.
 *
 * @package Convene\Storage\Service
 */
class UserService extends Service implements Contract\UserServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param \Convene\Storage\Repository\Contract\UserRepositoryInterface $repository
     */
    function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Create a new user entity and save to the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface
     */
    public function create(ParameterBag $payload): UserEntityInterface
    {
        $attributes = array_only($payload->all(), $this->getRepository()->getModel()->getFillable());
    }
}
