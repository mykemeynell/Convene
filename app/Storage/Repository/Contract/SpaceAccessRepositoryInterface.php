<?php

namespace Convene\Storage\Repository\Contract;

use ArchLayer\Repository\RepositoryInterface;
use Convene\Storage\Entity\Contract\SpaceAccessEntityInterface;

/**
 * Interface SpaceAccessRepositoryInterface.
 *
 * @package Convene\Storage\Repository\Contract
 */
interface SpaceAccessRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a space access entity using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface|null
     */
    public function findUsingSlug(string $slug): ?SpaceAccessEntityInterface;
}
