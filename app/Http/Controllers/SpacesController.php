<?php

namespace Convene\Http\Controllers;

use Convene\Http\Requests\Space\CreateSpaceRequest;
use Convene\Storage\Service\Contract\SpaceServiceInterface;
use Convene\Support\Concern\HasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SpacesController.
 *
 * @package Convene\Http\Controllers
 */
class SpacesController extends Controller
{
    use HasService;

    /**
     * SpacesController constructor.
     *
     * @param \Convene\Storage\Service\Contract\SpaceServiceInterface $space_service
     */
    function __construct(SpaceServiceInterface $space_service)
    {
        $this->setService($space_service);
    }

    /**
     * Show the spaces list view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('spaces', [
            'spaces' => $this->getService()->list()
        ]);
    }

    /**
     * Show the create space view.
     *
     * @return \Illuminate\View\View
     */
    public function showCreate(): View
    {
        return view('spaces.create');
    }

    /**
     * Show the spaces activity view.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showActivity(Request $request): View
    {
        return view('spaces.activity', [
            'space' => $this->getService()->findUsingSlug($request->route('space_slug'))
        ]);
    }

    /**
     * Handle creation of a new space.
     *
     * @param \Convene\Http\Requests\Space\CreateSpaceRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCreate(CreateSpaceRequest $request): RedirectResponse
    {
        try {
            /** @var \Convene\Storage\Entity\SpaceEntity $space */
            $space = $this->getService()->create($request->getParameterBag());

            return redirect()->route('spaces.showActivity', ['space_slug' => $space->getSlug()]);
        } catch(\Exception $exception) {
            return redirect()->route('spaces.showCreate');
        }
    }

    /**
     * Show a single space.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function showSpace(Request $request): View
    {
        return view('spaces.view');
    }
}
