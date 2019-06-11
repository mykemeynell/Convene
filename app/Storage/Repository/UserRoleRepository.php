<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\Contract\UserRoleEntityInterface;
use Convene\Storage\Repository\Contract\UserRoleRepositoryInterface;

/**
 * Class UserRoleRepository.
 *
 * @package Convene\Storage\Repository
 */
class UserRoleRepository extends Repository implements UserRoleRepositoryInterface
{
    /**
     * UserRoleRepository constructor.
     *
     * @param \Convene\Storage\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(UserRoleEntityInterface $entity)
    {
        $this->setModel($entity);
    }
}
