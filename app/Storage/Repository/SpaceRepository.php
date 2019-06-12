<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\SpaceEntity;
use Convene\Storage\Repository\Contract\SpaceRepositoryInterface;

/**
 * Class SpaceRepository
 *
 * @package Convene\Storage\Repository
 */
class SpaceRepository extends Repository implements SpaceRepositoryInterface
{
    /**
     * SpaceRepository constructor.
     *
     * @param \Convene\Storage\Entity\SpaceEntity|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(SpaceEntity $entity)
    {
        $this->setModel($entity);
    }
}
