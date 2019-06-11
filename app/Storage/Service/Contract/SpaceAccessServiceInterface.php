<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\SpacesAccessEntityInterface;

/**
 * Interface SpaceAccessServiceInterface.
 *
 * @package Convene\Storage\Service\Contract
 */
interface SpaceAccessServiceInterface extends ServiceInterface
{
    /**
     * Get a space access level via the id.
     *
     * @param string $id
     *
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|null
     */
    public function findUsingId(string $id): ?SpacesAccessEntityInterface;

    /**
     * Get a space access level via the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|null
     */
    public function findUsingSlug(string $slug): ?SpacesAccessEntityInterface;
}
