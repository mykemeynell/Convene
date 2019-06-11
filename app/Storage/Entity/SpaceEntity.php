<?php

namespace Convene\Storage\Entity;

use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Convene\Storage\Entity\Contract\SpacesAccessEntityInterface;
use Convene\Storage\Entity\Contract\UserEntityInterface;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use UuidColumn\Concern\HasUuidObserver;

/**
 * Class SpaceEntity.
 *
 * @package Convene\Storage\Entity
 */
class SpaceEntity extends Model implements SpaceEntityInterface
{
    use HasUuidObserver, HasTimestamps;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'spaces';

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
    protected $fillable = ['name', 'description', 'owner', 'access', 'slug',];

    /**
     * Get the display name.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return ucwords($this->name);
    }

    /**
     * Get the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Get the owner ID.
     *
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * Get the access level.
     *
     * @return string
     */
    public function getAccess(): string
    {
        return $this->access;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Get the Space Access level object.
     *
     * @return \Convene\Storage\Entity\Contract\SpacesAccessEntityInterface|Model
     */
    public function access(): SpacesAccessEntityInterface
    {
        return $this->hasOne(app('spacesAccess.entity'), 'access', 'id')->first();
    }

    /**
     * Get the owner user object.
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface|Model
     */
    public function owner(): UserEntityInterface
    {
        return $this->hasOne(app('user.entity'), 'owner', 'id')->first();
    }
}
