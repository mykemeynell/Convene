<?php

namespace Convene\Storage\Entity;

use Convene\Storage\Entity\Concern\SlugOptions as SlugOptionsConcern;
use Convene\Storage\Entity\Contract\PageEntityInterface;
use Convene\Storage\Entity\Contract\SpaceEntityInterface;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use UuidColumn\Concern\HasUuidObserver;

/**
 * Class PageEntity
 *
 * @package Convene\Storage\Entity
 */
class PageEntity extends Model implements PageEntityInterface
{
    use HasUuidObserver, HasTimestamps, HasSlug, SlugOptionsConcern;

    /**
     * Field to generate the slug from.
     *
     * @var string
     */
    public $createSlugFrom = 'title';

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'pages';

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
    protected $fillable = ['space_id', 'folder_id', 'title', 'slug', 'content',];

    /**
     * Get the parent space ID.
     *
     * @return string
     */
    public function getSpaceId(): string
    {
        return $this->space_id;
    }

    /**
     * Get the folder ID.
     *
     * @return string|null
     */
    public function getFolderId(): ?string
    {
        return $this->folder_id;
    }

    /**
     * Get the space.
     *
     * @return \Convene\Storage\Entity\Contract\SpaceEntityInterface|Model|null
     */
    public function space(): ?SpaceEntityInterface
    {
        return $this->hasOne(app('space.entity'), 'id', 'space_id')->first();
    }

    /**
     * Get the folder that the page belongs to.
     *
     * @return mixed
     */
    public function folder()
    {
        // TODO: Implement folder() method.
    }

    /**
     * Get the display name.
     * Alias of getTitle().
     *
     * @see \Convene\Storage\Entity\Contract\PageEntityInterface::getTitle()
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->getTitle();
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * Get the content as a string.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
}
