<?php

namespace Convene\Http\Requests\Concern;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Trait RequestHasParameterBag
 *
 * @method string|array|null input($key = null, $default = null)  Retrieve an input item from the request.
 *
 * @package Convene\Http\Requests\Concern
 */
trait RequestHasParameterBag
{
    /**
     * The namespace to retrieve payload from.
     *
     * @return string
     */
    abstract protected function getPayloadNamespace(): string;

    /**
     * Get a parameter bag containing the submitted payload.
     *
     * @return ParameterBag
     */
    public function getParameterBag(): ParameterBag
    {
        return new ParameterBag($this->input($this->getPayloadNamespace(), []));
    }

}
