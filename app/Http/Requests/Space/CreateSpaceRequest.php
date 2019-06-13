<?php

namespace Convene\Http\Requests\Space;

use Convene\Http\Requests\Concern\RequestHasNoRules;
use Convene\Http\Requests\Concern\RequestHasParameterBag;
use Convene\Http\Requests\Concern\RequestIsAuthorized;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateSpaceRequest
 *
 * @package Convene\Http\Requests\Space
 */
class CreateSpaceRequest extends FormRequest
{
    use RequestIsAuthorized, RequestHasNoRules, RequestHasParameterBag;

    /**
     * The namespace to retrieve payload from.
     *
     * @return string
     */
    protected function getPayloadNamespace(): string
    {
        return 'space';
    }
}
