<?php

namespace Convene\Storage\Entity\Contract;

/**
 * Interface SpaceEntityInterface
 *
 * @property string $name
 * @property string $description
 * @property string $owner
 * @property string $access
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package Convene\Storage\Entity\Contract
 */
interface SpaceEntityInterface
{
    /**
     * Get the display name.
     *
     * @return string
     */
    public function getDisplayName(): string;

    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Get the owner ID.
     *
     * @return string
     */
    public function getOwner(): string;

    /**
     * Get the access level.
     *
     * @return string
     */
    public function getAccess(): string;

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug(): string;

    /**
     * Get the Space Access level object.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceAccessEntityInterface
     */
    public function access(): SpaceAccessEntityInterface;

    /**
     * Get the owner user object.
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface
     */
    public function owner(): UserEntityInterface;
}
