<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Convene\Storage\Repository\Contract\SpaceRepositoryInterface;
use Convene\Storage\Service\Contract\SpaceServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
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
     * @param \Convene\Storage\Repository\Contract\SpaceRepositoryInterface $repository
     */
    function __construct(SpaceRepositoryInterface $repository)
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
        return $this->getRepository()->builder()->get();
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
        if($owner = Auth::user()->getKey()) {
            $payload->set('owner', $owner);
        }

        $attributes = array_only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \Convene\Storage\Entity\SpaceEntity $space */
        $space = $this->getRepository()->create($attributes);
        $space->save();

        return $space;
    }

    /**
     * Update Space Entity based on ID as matching field.
     *
     * @param string                                         $id
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return bool
     */
    public function edit(string $id, ParameterBag $payload): bool
    {
        $attributes = array_only($payload->all(), $this->getRepository()->getModel()->getFillable());
        $space = $this->getRepository()->findUsingId($id);

        return $space->update($attributes);
    }

    /**
     * Find a space using its slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?SpaceEntityInterface
    {
        return $this->getRepository()->builder()->where('slug', $slug)->first();
    }
}
