<?php

namespace Convene\Http\Controllers;

use Convene\Http\Requests\Page\PostPageRequest;
use Convene\Storage\Service\Contract\FolderServiceInterface;
use Convene\Storage\Service\Contract\PageServiceInterface;
use Convene\Storage\Service\Contract\SpaceServiceInterface;
use Convene\Support\Concern\HasService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class PagesController
 *
 * @package Convene\Http\Controllers
 */
class PagesController extends Controller
{
    use HasService;

    /**
     * PagesController constructor.
     *
     * @param \Convene\Storage\Service\Contract\PageServiceInterface  $page_service
     * @param \Convene\Storage\Service\Contract\SpaceServiceInterface $space_service
     */
    function __construct(
        PageServiceInterface $page_service,
        SpaceServiceInterface $space_service,
        FolderServiceInterface $folder_service
    ) {
        $this->setService($page_service, 'page');
        $this->setService($space_service, 'space');
        $this->setService($folder_service, 'folder');
    }

    /**
     * Handle the creation of a page.
     *
     * @param \Convene\Http\Requests\Page\PostPageRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleCreate(PostPageRequest $request)
    {
        $blocks = collect($request->get('page')['blocks']);
        $title = $blocks->filter(function ($item) {
            return $item['type'] == 'header' && $item['data']['level'] == 1;
        })->first()['data']['text'];

        if (empty($title)) {
            return json("Please create at least one header level 1 object", [], 400);
        }

        /** @var \Convene\Storage\Entity\SpaceEntity $space */
        $space = $this->getService('space')->findUsingSlug($request->route('space_slug'));

        try {
            $payload = [
                'space_id' => $space->getKey(),
                'folder_id' => null,
                'title' => $title,
                'content' => json_encode($blocks),
            ];

            /** @var \Convene\Storage\Entity\PageEntity $page */
            $page = $this->getService('page')->create(new ParameterBag($payload));

            return json("Page data saved successfully", array_merge_recursive([
                'url' => route('page.showSpace', ['space_slug' => $space->getSlug(), 'page_slug' => $page->getSlug()]),
            ], $page->toArray()), 200);
        } catch (\Exception $exception) {
            return json("Failed to save data because: {$exception->getMessage()}", [], 500);
        }
    }

    /**
     * Handle posting data to pages.
     *
     * @param \Convene\Http\Requests\Page\PostPageRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleUpdate(PostPageRequest $request)
    {
        $blocks = collect($request->get('page')['blocks']);
        $title = $blocks->filter(function ($item) {
            return $item['type'] == 'header';
        })->first()['data']['text'];

        if (empty($title)) {
            return json("Please create at least one header type object", [], 400);
        }

        /** @var \Convene\Storage\Entity\SpaceEntity $space */
        $space = $this->getService('space')->findUsingSlug(
            $request->route('space_slug')
        );

        if (empty($space)) {
            return json("That space doesn't exist", [], 404);
        }

        /** @var \Convene\Storage\Entity\PageEntity $page */
        $page = $this->getService('page')->findUsingSlug(
            $request->route('page_slug')
        );

        if (empty($page) || $page->getSpaceId() !== $space->getKey()) {
            return json("That page doesn't exist, or isn't assigned to that space", [], 404);
        }

        /** @var \Convene\Storage\Entity\FolderEntity $folder */
        if ($folder = $this->getService('folder')->findUsingSlug($request->route('folder_slug'))) {
            if ($folder->getSpaceId() !== $space->getKey()) {
                return json("That folder doesn't belong to the specified space", [], 404);
            }

            $folder_id = $folder->getKey();
            $url = route('page.showFolderSpace', [
                        'space_slug' => $space->getSlug(),
                        'folder_slug' => $folder->getSlug(),
                        'page_slug' => $page->getSlug(),
                    ]);
        } else {
            $folder_id = null;
            $url = route('page.showSpace', [
                'space_slug' => $space->getSlug(),
                'page_slug' => $page->getSlug(),
            ]);
        }

        try {
            $payload = [
                'space_id' => $space->getKey(),
                'folder_id' => $folder_id,
                'title' => $title,
                'content' => json_encode($blocks),
            ];

            $this->getService('page')->update($page->getKey(), new ParameterBag($payload));

            $page = $this->getService('page')->findUsingSlug($request->route('page_slug'));

            return json("Page data saved successfully", array_merge_recursive(compact('url'), $page->toArray()), 200);
        } catch (\Exception $exception) {
            return json("Failed to save data because: {$exception->getMessage()}", [], 500);
        }
    }

    /**
     * Show the create/edit page view.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showCreate(Request $request): View
    {
        $space = $this->getService('space')->findUsingSlug(
            $request->route('space_slug')
        );

        return view('pages.editor', compact('space'));
    }

    /**
     * Show a page within a space.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showPage(Request $request): View
    {
        /** @var \Convene\Storage\Entity\SpaceEntity $space */
        $space = $this->getService('space')->findUsingSlug($request->route('space_slug'));

        /** @var \Convene\Storage\Entity\PageEntity $page */
        $page = $this->getService('page')->findUsingSlug($request->route('page_slug'));

        if (empty($space)) {
            return abort(404);
        }

        if (empty($page)) {
            return abort(404);
        }

        if ($page->getSpaceId() !== $space->getKey()) {
            return abort(404);
        }

        return view('pages.view', compact('space', 'page'));
    }

    /**
     * Show the edit view.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showEdit(Request $request): View
    {
        /** @var \Convene\Storage\Entity\SpaceEntity $space */
        $space = $this->getService('space')->findUsingSlug(
            $request->route('space_slug')
        );

        if (empty($space)) {
            return abort(404);
        }

        /** @var \Convene\Storage\Entity\PageEntity $page */
        $page = $this->getService('page')->findUsingSlug(
            $request->route('page_slug')
        );

        if (empty($page) || $page->getSpaceId() !== $space->getKey()) {
            return abort(404);
        }

        /** @var \Convene\Storage\Entity\FolderEntity $folder */
        if ($folder = $this->getService('folder')->findUsingSlug($request->route('folder_slug'))) {
            if ($folder->getSpaceId() !== $space->getKey()) {
                return abort(404);
            }

            return view('pages.editor', compact('space', 'folder', 'page'));
        }

        return view('pages.editor', compact('space', 'page'));

    }

    /**
     * Show a page that belongs to a folder within a space.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showFolderPage(Request $request): View
    {
        /** @var \Convene\Storage\Entity\SpaceEntity $space */
        $space = $this->getService('space')->findUsingSlug($request->route('space_slug'));

        if (empty($space)) {
            return abort(404);
        }

        /** @var \Convene\Storage\Entity\FolderEntity $folder */
        $folder = $this->getService('folder')->findUsingSlug($request->route('folder_slug'));

        if (empty($folder) || $folder->getSpaceId() !== $space->getKey()) {
            return abort(404);
        }

        /** @var \Convene\Storage\Entity\PageEntity $page */
        $page = $this->getService('page')->findUsingSlug($request->route('page_slug'));

        if (empty($page) || $page->getFolderId() !== $folder->getKey() || $page->getSpaceId() !== $space->getKey()) {
            return abort(404);
        }

        return view('pages.view', compact('space', 'folder', 'page'));
    }
}
