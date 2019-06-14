<?php

namespace Convene\Http\Controllers;

use Convene\Http\Requests\Page\PostPageRequest;

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
        $attributes = collect($request->get('page'));
        $blocks = collect($attributes->get('blocks'));
        $slug = $title = $blocks->filter(function($item) {
            return $item['type'] == 'header';
        })->first()['data']['text'];

        if(empty($slug)) {
            return json("Please create at least one header type object", [], 400);
        }

        return json("Page data saved successfully", $attributes, 200);
    }
}
