<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\SpacesAccessEntityInterface;
use Convene\Storage\Repository\Contract\SpaceAccessRepositoryInterface;
use Convene\Storage\Service\Contract\SpaceAccessServiceInterface;

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
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingId(string $id): ?SpacesAccessEntityInterface
    {
        return $this->getRepository()->findUsingId($id);
    }

    /**
     * Get a space access level via the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?SpacesAccessEntityInterface
    {
        return $this->findUsingSlug($slug);
    }
}
