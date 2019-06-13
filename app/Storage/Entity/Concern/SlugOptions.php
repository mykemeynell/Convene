<?php

namespace Convene\Storage\Entity\Concern;

use Spatie\Sluggable\SlugOptions as BaseSlugOptions;

/**
 * Trait SlugOptions
 *
 * @property string|array $createSlugFrom  Field that the slug is generated from.
 * @property string       $saveSlugTo      Field that the slug is saved to.
 *
 * @package Convene\Storage\Entity\Concern
 */
trait SlugOptions
{
    /**
     * Options that are used when generating a slug.
     *
     * @return BaseSlugOptions
     */
    public function getSlugOptions(): BaseSlugOptions
    {
        $from = property_exists($this, 'createSlugFrom') ? $this->createSlugFrom : 'title';
        $to = property_exists($this, 'saveSlugTo') ? $this->saveSlugTo : 'slug';

        return BaseSlugOptions::create()
            ->generateSlugsFrom($from)
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo($to);
    }
}
