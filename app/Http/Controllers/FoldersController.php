<?php

namespace Convene\Http\Controllers;

use Convene\Http\Requests\Folder\CreateFolderRequest;
use Convene\Storage\Service\Contract\FolderServiceInterface;
use Convene\Support\Concern\HasService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FoldersController.
 *
 * @package Convene\Http\Controllers
 */
class FoldersController extends Controller
{
    use HasService;

    function __construct(FolderServiceInterface $service)
    {
        $this->setService($service, 'folder');
    }

    /**
     * Create a folder.
     *
     * @param \Convene\Http\Requests\Folder\CreateFolderRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFolder(CreateFolderRequest $request): JsonResponse
    {
        try {
            /** @var \Convene\Storage\Entity\FolderEntity $folder */
            $folder = $this->getService('folder')->create($request->getParameterBag());

            return json("Created folder", $folder->toArray(), 201);
        } catch(\Exception $exception) {
            return json("Couldn't create that folder at this time", $exception, 500);
        }
    }
}
