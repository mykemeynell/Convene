<?php

namespace Convene\Storage\Entity;

use Convene\Storage\Entity\Concern\SlugOptions as SlugOptionsConcern;
use Convene\Storage\Entity\Contract\FolderEntityInterface;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use UuidColumn\Concern\HasUuidObserver;

class FolderEntity extends Model implements FolderEntityInterface
{
    use HasUuidObserver, HasTimestamps, HasSlug, SlugOptionsConcern;

    /**
     * Field to generate the slug from.
     *
     * @var string
     */
    public $createSlugFrom = 'name';

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'folders';

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
    protected $fillable = ['name', 'slug',];

    /**
     * Get the folders display name.
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return ucwords($this->name);
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
     * Get the space id.
     *
     * @return string
     */
    public function getSpaceId(): string
    {
        return $this->space_id;
    }

    /**
     * Get the space object.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|Model|null
     */
    public function space(): ?SpaceEntityInterface
    {
        return $this->hasOne(app('space.entity'), 'id', 'space_id')->first();
    }

    /**
     * Get pages that belong to a folder.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function pages(): Collection
    {
        return $this->hasMany(app('page.entity'), 'folder_id', 'id')->get();
    }
}
