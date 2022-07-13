<?php

namespace Yaraplus\IntegrationClient\Instagram\Rules;

use Illuminate\Contracts\Validation\Rule;
use Yaraplus\IntegrationClient\Instagram\Facades\Story;

class StoryUrl implements Rule
{
    public function passes($attribute, $value)
    {
        return Story::isValidUrl($value);
    }

    public function message()
    {
        return trans('instagram-integration-client::validation.story_url');
    }
}
