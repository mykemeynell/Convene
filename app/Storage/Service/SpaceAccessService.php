<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\SpaceAccessEntityInterface;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Convene\Storage\Repository\Contract\SpaceAccessRepositoryInterface;
use Convene\Storage\Service\Contract\SpaceAccessServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class SpaceAccessService.
 *
 * @package Convene\Storage\Service
 */
class SpaceAccessService extends Service implements SpaceAccessServiceInterface
{
    /**
     * SpaceAccessService constructor.
     *
     * @param \Convene\Storage\Repository\Contract\SpaceAccessRepositoryInterface|\ArchLayer\Repository\Repository $repository
     */
    function __construct(SpaceAccessRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Get a space access level via the id.
     *
     * @param string $id
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingId(string $id): ?SpaceAccessEntityInterface
    {
        return $this->getRepository()->findUsingId($id);
    }

    /**
     * Get a space access level via the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?SpaceAccessEntityInterface
    {
        return $this->getRepository()->builder()->where('slug', $slug)->first();
    }

    /**
     * Create a new access entity in the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface
     */
    public function create(ParameterBag $payload): SpaceAccessEntityInterface
    {
        $attributes = array_only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \Convene\Storage\Entity\SpaceAccessEntity $entity */
        $entity = $this->getRepository()->create($attributes);
        $entity->save();

        return $entity;
    }

    /**
     * Fetch all access levels.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchAll(): Collection
    {
        return $this->getRepository()->builder()->get();
    }
}
