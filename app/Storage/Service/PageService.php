<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\PageEntityInterface;
use Convene\Storage\Repository\Contract\PageRepositoryInterface;
use Convene\Storage\Service\Contract\PageServiceInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

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

    /**
     * Create a new page.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface
     */
    public function create(ParameterBag $payload): PageEntityInterface
    {
        $attributes = array_only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \Convene\Storage\Entity\PageEntity $page */
        $page = $this->getRepository()->create($attributes);
        $page->save();

        return $page;
    }
}
