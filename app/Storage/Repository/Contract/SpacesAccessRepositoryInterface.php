<?php

namespace Convene\Storage\Repository\Contract;

use ArchLayer\Repository\RepositoryInterface;
use Convene\Storage\Entity\Contract\SpacesAccessEntityInterface;

/**
 * Interface SpaceAccessRepositoryInterface.
 *
 * @package Convene\Storage\Repository\Contract
 */
interface SpacesAccessRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a space access entity using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|null
     */
    public function findUsingSlug(string $slug): ?SpacesAccessEntityInterface;
}
