<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\Contract\SpaceAccessEntityInterface;
use Convene\Storage\Repository\Contract\SpaceAccessRepositoryInterface;

/**
 * Class SpaceAccessRepository.
 *
 * @package Convene\Storage\Repository
 */
class SpaceAccessRepository extends Repository implements SpaceAccessRepositoryInterface
{
    /**
     * SpaceAccessRepository constructor.
     *
     * @param \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(SpaceAccessEntityInterface $entity)
    {
        $this->setModel($entity);
    }

    /**
     * Find a space access entity using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?SpaceAccessEntityInterface
    {
        return $this->builder()->where('slug', $slug)->first();
    }
}
