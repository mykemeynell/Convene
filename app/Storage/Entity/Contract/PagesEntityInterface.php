<?php

namespace Convene\Storage\Entity\Contract;

/**
 * Interface PagesEntityInterface
 *
 * @property string $space_id
 * @property string|null $folder_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package Convene\Storage\Entity\Contract
 */
interface PagesEntityInterface
{
    /**
     * Get the parent space ID.
     *
     * @return string
     */
    public function getSpaceId(): string;

    /**
     * Get the folder ID.
     *
     * @return string|null
     */
    public function getFolderId(): ?string;

    /**
     * Get the space.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|null
     */
    public function space(): ?SpaceEntityInterface;

    /**
     * Get the folder that the page belongs to.
     *
     * @return mixed
     */
    public function folder();

    /**
     * Get the display name.
     * Alias of getTitle().
     *
     * @see \Convene\Storage\Entity\Contract\PagesEntityInterface::getTitle()
     *
     * @return string
     */
    public function getDisplayName(): string;

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug(): string;

    /**
     * Get the content as a string.
     *
     * @return string|null
     */
    public function getContent(): ?string;
}
