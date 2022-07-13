<?php

namespace Yaraplus\IntegrationClient\Instagram\Facades;

use Illuminate\Support\Facades\Facade;
use Yaraplus\IntegrationClient\Instagram\Interfaces\AccountInterface;

/**
 * @method static findByUsername(string $username)
 * @method static extractUsernameFromMention(string $mention)
 * @method static isValidMention(string $mention)
 * @method static isValidUsername(string $username)
 */

class Account extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountInterface::class;
    }
}
