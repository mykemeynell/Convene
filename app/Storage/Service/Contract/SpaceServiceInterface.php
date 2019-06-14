<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Convene\Storage\Entity\SpaceEntity;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface SpaceServiceInterface
 *
 * @package Convene\Storage\Service\Contract
 */
interface SpaceServiceInterface extends ServiceInterface
{
    /**
     * Get a list of spaces that a user has access to.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection;

    /**
     * Create a new space.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface
     */
    public function create(ParameterBag $payload): SpaceEntityInterface;

    /**
     * Update Space Entity based on ID as matching field.
     *
     * @param string                                         $id
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return bool
     */
    public function edit(string $id, ParameterBag $payload): bool;

    /**
     * Find a space using its slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|null
     */
    public function findUsingSlug(string $slug): ?SpaceEntityInterface;
}
