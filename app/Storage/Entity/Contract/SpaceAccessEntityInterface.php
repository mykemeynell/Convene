<?php

namespace Convene\Storage\Entity\Contract;

/**
 * Interface SpaceAccessEntityInterface.
 *
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package Convene\Storage\Entity\Contract
 */
interface SpaceAccessEntityInterface
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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug(): string;

    /**
     * Get the icon.
     *
     * @return string
     */
    public function getIcon(): string;
}
