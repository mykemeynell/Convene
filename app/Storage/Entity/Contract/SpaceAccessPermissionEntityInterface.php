<?php

namespace Convene\Storage\Entity\Contract;

/**
 * Interface SpaceAccessPermissionEntityInterface
 *
 * @property string $space_id
 * @property string $object_type
 * @property string $object_id
 *
 * @package Convene\Storage\Entity\Contract
 */
interface SpaceAccessPermissionEntityInterface
{
    /**
     * Get the space ID.
     *
     * @return string
     */
    public function getSpaceId(): string;

    /**
     * Get the object type.
     *
     * @return string
     */
    public function getObjectType(): string;

    /**
     * Get the object ID.
     *
     * @return string
     */
    public function getObjectId(): string;

    /**
     * The space entity object.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface
     */
    public function space(): SpaceEntityInterface;

    /**
     * The object that has access to this space.
     * This can be a group of users, or a single user. The variation of this is specified using $object_type.
     *
     * @return \Convene\Storage\Entity\Contract\UserEntityInterface
     */
    public function object();
}
