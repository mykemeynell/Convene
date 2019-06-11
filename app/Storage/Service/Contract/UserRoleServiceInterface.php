<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\UserRoleEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface UserRoleServiceInterface.
 *
 * @package Convene\Storage\Service\Contract
 */
interface UserRoleServiceInterface extends ServiceInterface
{
    /**
     * Create a user role.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\UserRoleEntityInterface
     */
    public function create(ParameterBag $payload): UserRoleEntityInterface;
}
