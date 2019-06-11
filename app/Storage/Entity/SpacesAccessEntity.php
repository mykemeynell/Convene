<?php

namespace Convene\Storage\Entity;

use ArchLayer\Entity\Concern\EntityHasTimestamps;
use Convene\Storage\Entity\Contract\SpacesAccessEntityInterface;
use Illuminate\Database\Eloquent\Model;
use UuidColumn\Concern\HasUuidObserver;

class SpacesAccessEntity extends Model implements SpacesAccessEntityInterface
{
    use EntityHasTimestamps, HasUuidObserver;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'space_access';

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
    protected $fillable = ['name', 'description', 'slug', 'icon',];

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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Get the icon.
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
}
