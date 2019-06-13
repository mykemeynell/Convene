<?php

namespace Convene\Http\Controllers;

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
        return view('spaces');
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
     * Handle creation of a new space.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCreate(Request $request): RedirectResponse
    {

    }
}
