<?php

namespace Convene\Http\Controllers;

use Illuminate\View\View;

/**
 * Class DefaultViewController
 *
 * @package Convene\Http\Controllers
 */
class DefaultViewController extends Controller
{
    /**
     * Default view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('page');
    }
}
