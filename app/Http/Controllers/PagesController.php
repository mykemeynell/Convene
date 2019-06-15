<?php

namespace Convene\Http\Controllers;

use Convene\Http\Requests\Page\PostPageRequest;
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
    function __construct(PageServiceInterface $page_service, SpaceServiceInterface $space_service)
    {
        $this->setService($page_service, 'page');
        $this->setService($space_service, 'space');
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
        $attributes = collect($request->get('page'));
        $blocks = collect($attributes->get('blocks'));
        $title = $blocks->filter(function($item) {
            return $item['type'] == 'header';
        })->first()['data']['text'];

        if(empty($title)) {
            return json("Please create at least one header type object", [], 400);
        }

        $space_id = $this->getService('space')->findUsingSlug($request->route('space_slug'))->getKey();

        $payload = [
            'space_id' => $space_id,
            'folder_id' => '',
            'title' => $title,
            'content' => json_encode($blocks),
        ];

        return json("Page data saved successfully", $payload, 200);
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
    }

    public function showCreate(Request $request): View
    {
        $space = $this->getService('space')->findUsingSlug(
            $request->route('space_slug')
        );

        return view('page', compact('space'));
    }
}
