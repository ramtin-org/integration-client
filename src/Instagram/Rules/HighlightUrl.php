<?php

namespace Yaraplus\IntegrationClient\Instagram\Rules;

use Illuminate\Contracts\Validation\Rule;
use Yaraplus\IntegrationClient\Instagram\Facades\Highlight;

class HighlightUrl implements Rule
{
    public function passes($attribute, $value)
    {
        return Highlight::isValidUrl($value);
    }

    public function message()
    {
        return trans('instagram-integration-client::validation.highlight_url');
    }
}
