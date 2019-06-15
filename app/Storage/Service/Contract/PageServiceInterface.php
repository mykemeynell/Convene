<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\PageEntityInterface;

/**
 * Interface PageServiceInterface
 *
 * @package Convene\Storage\Service\Contract
 */
interface PageServiceInterface extends ServiceInterface
{
    /**
     * Find a page using its ID.
     *
     * @param string $id
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface
     */
    public function findUsingId(string $id): PageEntityInterface;

    /**
     * Find a page using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface
     */
    public function findUsingSlug(string $slug): PageEntityInterface;
}
