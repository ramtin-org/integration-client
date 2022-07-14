<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

interface AccountInterface
{
    public function findByUsername(string $username): ModelInterface;

    public function extractUsernameFromMention(string $mention): string;

    public function isValidMention(string $mention): bool;

    public function isValidUsername(string $username): bool;
}
