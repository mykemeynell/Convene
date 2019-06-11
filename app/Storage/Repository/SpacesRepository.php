<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\SpaceEntity;
use Convene\Storage\Repository\Contract\SpacesRepositoryInterface;

/**
 * Class SpacesRepository
 *
 * @package Convene\Storage\Repository
 */
class SpacesRepository extends Repository implements SpacesRepositoryInterface
{
    /**
     * SpacesRepository constructor.
     *
     * @param \Convene\Storage\Entity\SpaceEntity|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(SpaceEntity $entity)
    {
        $this->setModel($entity);
    }
}
