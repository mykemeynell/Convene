<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\Contract\SpacesAccessEntityInterface;
use Convene\Storage\Repository\Contract\SpacesAccessRepositoryInterface;

/**
 * Class SpaceAccessRepository.
 *
 * @package Convene\Storage\Repository
 */
class SpacesAccessRepository extends Repository implements SpacesAccessRepositoryInterface
{
    /**
     * SpaceAccessRepository constructor.
     *
     * @param \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(SpacesAccessEntityInterface $entity)
    {
        $this->setModel($entity);
    }

    /**
     * Find a space access entity using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?SpacesAccessEntityInterface
    {
        return $this->builder()->where('slug', $slug)->first();
    }
}
