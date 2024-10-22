<?php

namespace Convene\View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ViewComposer
 *
 * @package Convene\View
 */
class ViewComposer
{
    /**
     * Request object.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * ViewComposer constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind the authenticated admin user to view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('path', $this->request->path());
        $view->with('request', $this->request);

        if(Auth::user())
            $view->with('user', Auth::user());

        if(! empty($this->request->route()))
            $view->with('route', $this->request->route()->getName());
    }
}
