<?php

namespace Convene\Storage\Entity;

use Convene\Storage\Entity\Contract\UserRoleEntityInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRoleEntity.
 *
 * @package Convene\Storage\Entity
 */
class UserRoleEntity extends Model implements UserRoleEntityInterface
{
    /**
     * Get the display name of a role.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return ucwords($this->name);
    }

    /**
     * Get the description of a role.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
