<?php

namespace Yaraplus\IntegrationClient\Instagram\Facades;

use Illuminate\Support\Facades\Facade;
use Yaraplus\IntegrationClient\Instagram\Interfaces\PostInterface;

/**
 * @method static findByCode(string $code)
 * @method static extractCodeFromUrl(string $url)
 * @method static isValidUrl(string $url)
 */

class Post extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PostInterface::class;
    }
}
