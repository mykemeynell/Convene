<?php

namespace Convene\Http\Requests\Concern;

/**
 * Trait RequestIsAuthorized
 *
 * @package Convene\Http\Requests\Concern
 */
trait RequestIsAuthorized
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
