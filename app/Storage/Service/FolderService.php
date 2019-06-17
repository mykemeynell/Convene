<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
use Convene\Storage\Entity\Contract\FolderEntityInterface;
use Convene\Storage\Repository\Contract\FolderRepositoryInterface;
use Convene\Storage\Service\Contract\FolderServiceInterface;

/**
 * Class FolderService.
 *
 * @package Convene\Storage\Service
 */
class FolderService extends Service implements FolderServiceInterface
{
    /**
     * FolderService constructor.
     *
     * @param \Convene\Storage\Repository\Contract\FolderRepositoryInterface $repository
     */
    function __construct(FolderRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Find a folder using its ID.
     *
     * @param string $id
     *
     * @return \Convene\Storage\Entity\Contract\FolderEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingId(string $id): ?FolderEntityInterface
    {
        return $this->getRepository()->findUsingId($id);
    }

    /**
     * Find a folder using its slug.
     *
     * @param string $slug
     *
     * @return \Convene\Storage\Entity\Contract\FolderEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingSlug(string $slug): ?FolderEntityInterface
    {
        return $this->getRepository()->builder()->where('slug', $slug)->first();
    }
}
