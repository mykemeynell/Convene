<?php

namespace Convene\Storage\Repository;

use ArchLayer\Repository\Repository;
use Convene\Storage\Entity\Contract\FolderEntityInterface;
use Convene\Storage\Repository\Contract\FolderRepositoryInterface;

/**
 * Class FolderRepository.
 *
 * @package Convene\Storage\Repository
 */
class FolderRepository extends Repository implements FolderRepositoryInterface
{
    /**
     * FolderRepository constructor.
     *
     * @param \Convene\Storage\Entity\Contract\FolderEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(FolderEntityInterface $entity)
    {
        $this->setModel($entity);
    }
}
