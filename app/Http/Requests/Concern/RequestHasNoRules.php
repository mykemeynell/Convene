<?php

namespace Convene\Http\Requests\Concern;

/**
 * Trait RequestHasNoRules
 *
 * @package Convene\Http\Requests\Concern
 */
trait RequestHasNoRules
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
