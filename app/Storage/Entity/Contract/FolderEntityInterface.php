<?php

namespace Convene\Storage\Entity\Contract;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface FolderEntityInterface.
 *
 * @property string $name
 * @property string $slug
 * @property string $space_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package Convene\Storage\Entity\Contract
 */
interface FolderEntityInterface
{
    /**
     * Get the folders display name.
     *
     * @return string
     */
    public function getDisplayName(): string;

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug(): string;

    /**
     * Get the space id.
     *
     * @return string
     */
    public function getSpaceId(): string;

    /**
     * Get the space object.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|null
     */
    public function space(): ?SpaceEntityInterface;

    /**
     * Get pages that belong to a folder.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function pages(): Collection;
}
