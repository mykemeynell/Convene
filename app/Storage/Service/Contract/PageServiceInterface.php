<?php

namespace Convene\Storage\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use Convene\Storage\Entity\Contract\PageEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

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
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface|null
     */
    public function findUsingId(string $id): ?PageEntityInterface;

    /**
     * Find a page using the slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface|null
     */
    public function findUsingSlug(string $slug): ?PageEntityInterface;

    /**
     * Create a new page.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \Convene\Storage\Entity\Contract\PageEntityInterface|null
     */
    public function create(ParameterBag $payload): ?PageEntityInterface;
}
