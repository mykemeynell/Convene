<?php

namespace Convene\Storage\Repository\Contract;

use ArchLayer\Repository\RepositoryInterface;
use Convene\Storage\Entity\Contract\PageEntityInterface;

/**
 * Interface PageRepositoryInterface
 *
 * @package Convene\Storage\Repository\Contract
 */
interface PageRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a Page Entity using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface
     */
    public function findUsingSlug(string $slug): PageEntityInterface;
}
