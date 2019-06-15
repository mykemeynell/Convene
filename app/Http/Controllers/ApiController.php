<?php

namespace Convene\Http\Controllers;

use DOMDocument;
use DOMXPath;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ApiController
 *
 * @package Convene\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * Get meta data from URL.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchUrlMeta(Request $request): JsonResponse
    {
        $success = false;
        $meta = [];

        $url = $request->get('url');

        $dom = new DOMDocument;

        if (@$dom->loadHTMLFile($url))
        {
            $success = true;
            $title = $dom->getElementsByTagName('title');
            if ($title->length > 0)
            {
                $meta['title'] = $title->item(0)->textContent;
            }

            $metas = $dom->getElementsByTagName('meta');
            for ($i = 0; $i < $metas->length; $i++)
            {
                /** @var \DOMElement $meta */
                $meta_tag = $metas->item($i);

                if($meta_tag->getAttribute('property') == 'og:image')
                    $meta['image']['url'] = $meta_tag->getAttribute('content');

                if($meta_tag->getAttribute('name') == 'description')
                    $meta['description'] = $meta_tag->getAttribute('content');
            }
        }

        return response()->json(compact('success', 'meta'));
    }

    /**
     * Upload a file to Convene.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFile(Request $request): JsonResponse
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $request->files->get('image');

        try {
            $upload = upload($file);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
            ]);
        }

        return response()->json([
            'success' => true,
            'file' => [
                'url' => $upload->get('url')
            ]
        ]);

    }
}
