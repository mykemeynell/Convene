<?php

namespace Convene\Http\Requests\Page;

use Convene\Http\Requests\Concern\RequestHasNoRules;
use Convene\Http\Requests\Concern\RequestHasParameterBag;
use Convene\Http\Requests\Concern\RequestIsAuthorized;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PostPageRequest
 *
 * @package Convene\Http\Requests\Page
 */
class PostPageRequest extends FormRequest
{
    use RequestIsAuthorized, RequestHasNoRules;
}
