<?php

namespace Convene\Storage\Entity;

use ArchLayer\Entity\Concern\EntityHasTimestamps;
use Convene\Storage\Entity\Contract\UserRoleEntityInterface;
use Illuminate\Database\Eloquent\Model;
use UuidColumn\Concern\HasUuidObserver;

/**
 * Class UserRoleEntity.
 *
 * @package Convene\Storage\Entity
 */
class UserRoleEntity extends Model implements UserRoleEntityInterface
{
    use EntityHasTimestamps, HasUuidObserver;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description',];

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
