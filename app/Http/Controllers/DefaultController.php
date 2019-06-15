<?php

namespace Convene\Http\Controllers;

use Illuminate\Http\RedirectResponse;

/**
 * Class DefaultController
 *
 * @package Convene\Http\Controllers
 */
class DefaultController extends Controller
{
    /**
     * Redirect user to default view.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return redirect()->route('default.view');
    }
}
