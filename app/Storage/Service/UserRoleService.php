<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\UserRoleEntityInterface;
use Convene\Storage\Repository\Contract\UserRoleRepositoryInterface;
use Convene\Storage\Service\Contract\UserRoleServiceInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class UserRoleService.
 *
 * @package Convene\Storage\Service
 */
class UserRoleService extends Service implements UserRoleServiceInterface
{
    /**
     * UserRoleService constructor.
     *
     * @param \Convene\Storage\Repository\Contract\UserRoleRepositoryInterface|\ArchLayer\Repository\Repository $repository
     */
    function __construct(UserRoleRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Create a user role.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\UserRoleEntityInterface
     */
    public function create(ParameterBag $payload): UserRoleEntityInterface
    {
        $attributes = array_only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \Convene\Storage\Entity\UserRoleEntity $role */
        $role = $this->getRepository()->create($attributes);
        $role->save();

        return $role;
    }

    /**
     * Get a role by name.
     *
     * @param string $name
     *
     * @return \Convene\Storage\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function findByName(string $name): UserRoleEntityInterface
    {
        return $this->getRepository()->builder()->where('name', $name)->first();
    }
}
