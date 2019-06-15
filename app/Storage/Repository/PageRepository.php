<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\Contract\PageEntityInterface;
use Convene\Storage\Repository\Contract\PageRepositoryInterface;

/**
 * Class PageRepository
 *
 * @package Convene\Storage\Repository
 */
class PageRepository extends Repository implements PageRepositoryInterface
{
    /**
     * PageRepository constructor.
     *
     * @param \Convene\Storage\Entity\Contract\PageEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(PageEntityInterface $entity)
    {
        $this->setModel($entity);
    }

    /**
     * Find a Page Entity using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?PageEntityInterface
    {
        return $this->builder()->where('slug', $slug)->first();
    }
}
