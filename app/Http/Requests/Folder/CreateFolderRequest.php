<?php

namespace Convene\Http\Requests\Folder;

use Convene\Http\Requests\Concern\RequestHasNoRules;
use Convene\Http\Requests\Concern\RequestHasParameterBag;
use Convene\Http\Requests\Concern\RequestIsAuthorized;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateFolderRequest.
 *
 * @package Convene\Http\Requests\Folder
 */
class CreateFolderRequest extends FormRequest
{
    use RequestIsAuthorized, RequestHasParameterBag, RequestHasNoRules;

    /**
     * The namespace to retrieve payload from.
     *
     * @return string
     */
    protected function getPayloadNamespace(): string
    {
        return 'folder';
    }
}
