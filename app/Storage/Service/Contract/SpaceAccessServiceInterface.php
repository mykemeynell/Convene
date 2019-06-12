<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\SpaceAccessEntityInterface;

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
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|null
     */
    public function findUsingId(string $id): ?SpaceAccessEntityInterface;

    /**
     * Get a space access level via the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|null
     */
    public function findUsingSlug(string $slug): ?SpaceAccessEntityInterface;
}
