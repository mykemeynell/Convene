<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\SpaceAccessEntityInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

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

    /**
     * Create a new access entity in the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface
     */
    public function create(ParameterBag $payload): SpaceAccessEntityInterface;

    /**
     * Fetch all access levels.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchAll(): Collection;
}
