<?php

namespace Convene\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SpacesController.
 *
 * @package Convene\Http\Controllers
 */
class SpacesController extends Controller
{
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
}
