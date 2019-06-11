<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\UserEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface UserServiceInterface.
 *
 * @package Convene\Storage\Service\Contract
 */
interface UserServiceInterface extends ServiceInterface
{
    /**
     * Create a new user entity and save to the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface
     */
    public function create(ParameterBag $payload): UserEntityInterface;
}
