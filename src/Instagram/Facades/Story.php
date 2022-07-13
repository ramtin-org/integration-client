<?php

namespace Yaraplus\IntegrationClient\Instagram\Facades;

use Illuminate\Support\Facades\Facade;
use Yaraplus\IntegrationClient\Instagram\Interfaces\StoryInterface;

/**
 * @method static find(int $id, string $username)
 * @method static extractIdFromUrl(string $url)
 * @method static extractUsernameFromUrl(string $url)
 * @method static isValidUrl(string $url)
 */

class Story extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StoryInterface::class;
    }
}
