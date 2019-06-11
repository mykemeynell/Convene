<?php

namespace Convene\Storage\Entity\Contract;

/**
 * Interface UserRoleEntityInterface.
 *
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package Convene\Storage\Entity\Contract
 */
interface UserRoleEntityInterface
{
    /**
     * Get the display name of a role.
     *
     * @return string
     */
    public function getDisplayName(): string;

    /**
     * Get the description of a role.
     *
     * @return string|null
     */
    public function getDescription(): ?string;
}
