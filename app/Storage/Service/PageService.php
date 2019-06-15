<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\PageEntityInterface;
use Convene\Storage\Repository\Contract\PageRepositoryInterface;
use Convene\Storage\Service\Contract\PageServiceInterface;

/**
 * Class PageService.
 *
 * @package Convene\Storage\Service
 */
class PageService extends Service implements PageServiceInterface
{
    /**
     * PageService constructor.
     *
     * @param \Convene\Storage\Repository\Contract\PageRepositoryInterface $repository
     */
    function __construct(PageRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Find a page using its ID.
     *
     * @param string $id
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function findUsingId(string $id): PageEntityInterface
    {
        return $this->getRepository()->findUsingId($id);
    }

    /**
     * Find a page using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function findUsingSlug(string $slug): PageEntityInterface
    {
        return $this->getRepository()->findUsingSlug($slug);
    }
}
