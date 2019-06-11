<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Convene\Storage\Repository\Contract\SpacesRepositoryInterface;
use Convene\Storage\Service\Contract\SpaceServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class SpaceService
 *
 * @package Convene\Storage\Service
 */
class SpaceService extends Service implements SpaceServiceInterface
{
    /**
     * SpaceService constructor.
     *
     * @param \Convene\Storage\Repository\Contract\SpacesRepositoryInterface $repository
     */
    function __construct(SpacesRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Get a list of spaces that a user has access to.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        // TODO: Implement list() method.
    }

    /**
     * Create a new space.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface
     */
    public function create(ParameterBag $payload): SpaceEntityInterface
    {
        // TODO: Implement create() method.
    }

    /**
     * Update Space Entity based on ID as matching field.
     *
     * @param string                                         $id
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface
     */
    public function edit(string $id, ParameterBag $payload): SpaceEntityInterface
    {
        // TODO: Implement edit() method.
    }
}
