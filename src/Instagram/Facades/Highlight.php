<?php

namespace Yaraplus\IntegrationClient\Instagram\Facades;

use Illuminate\Support\Facades\Facade;
use Yaraplus\IntegrationClient\Instagram\Interfaces\HighlightInterface;

/**
 * @method static getStories(int $id)
 * @method static isValidUrl(string $url)
 * @method static extractIdFromUrl(string $url)
 */

class Highlight extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HighlightInterface::class;
    }
}
