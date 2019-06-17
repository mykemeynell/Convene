<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\FolderEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface FolderServiceInterface.
 *
 * @package Convene\Storage\Service\Contract
 */
interface FolderServiceInterface extends ServiceInterface
{
    /**
     * Find a folder using its ID.
     *
     * @param string $id
     *
     * @return \Convene\Storage\Entity\Contract\FolderEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingId(string $id): ?FolderEntityInterface;

    /**
     * Find a folder using its slug.
     *
     * @param string|null $slug
     *
     * @return \Convene\Storage\Entity\Contract\FolderEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(?string $slug): ?FolderEntityInterface;

    /**
     * Create a new folder instance.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\FolderEntityInterface|null
     */
    public function create(ParameterBag $payload): ?FolderEntityInterface;
}
