<?php

namespace Convene\Http\Controllers;

use Convene\Http\Requests\Page\PostPageRequest;
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
     * @param \Convene\Http\Requests\Page\PostPageRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handlePost(PostPageRequest $request)
    {
        return response()->json($request->all());
    }
}
