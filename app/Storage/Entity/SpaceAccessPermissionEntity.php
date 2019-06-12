<?php

namespace Convene\Storage\Entity;

use Convene\Storage\Entity\Contract\SpaceAccessPermissionEntityInterface;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use UuidColumn\Concern\HasUuidObserver;

/**
 * Class SpaceAccessPermissionEntity
 *
 * @package Convene\Storage\Entity
 */
class SpaceAccessPermissionEntity extends Model implements SpaceAccessPermissionEntityInterface
{
    use HasUuidObserver, HasTimestamps;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'space_access_permissions';

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
    protected $fillable = ['space_id', 'object_type', 'object_id',];

    /**
     * Get the space ID.
     *
     * @return string
     */
    public function getSpaceId(): string
    {
        return $this->space_id;
    }

    /**
     * Get the object type.
     *
     * @return string
     */
    public function getObjectType(): string
    {
        return $this->object_type;
    }

    /**
     * Get the object ID.
     *
     * @return string
     */
    public function getObjectId(): string
    {
        return $this->object_id;
    }

    /**
     * The space entity object.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|Model
     */
    public function space(): SpaceEntityInterface
    {
        /** @var SpaceEntityInterface $space */
        $space = app('space.entity');

        return $this->hasOne($space, 'space_id', 'id')->first();
    }

    /**
     * The object that has access to this space.
     * This can be a group of users, or a single user. The variation of this is specified using $object_type.
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface
     */
    public function object()
    {
        // TODO: Implement object() method.
    }
}
