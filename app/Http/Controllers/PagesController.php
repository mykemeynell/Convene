<?php

namespace Convene\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class PagesController
 *
 * @package Convene\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * Handle posting data to pages.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function handlePost(Request $request)
    {
        dd($request->all());
    }
}
