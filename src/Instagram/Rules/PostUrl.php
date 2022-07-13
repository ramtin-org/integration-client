<?php

namespace Yaraplus\IntegrationClient\Instagram\Rules;

use Illuminate\Contracts\Validation\Rule;
use Yaraplus\IntegrationClient\Instagram\Facades\Post;

class PostUrl implements Rule
{
    public function passes($attribute, $value)
    {
        return Post::isValidUrl($value);
    }

    public function message()
    {
        return trans('instagram-integration-client::validation.post_url');
    }
}
