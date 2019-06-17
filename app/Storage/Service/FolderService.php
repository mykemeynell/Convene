<?php

namespace Convene\Storage\Service;

use ArchLayer\Service\Service;
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
}
