<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

interface AccountInterface
{
    public function findByUsername(string $username): object;

    public function extractUsernameFromMention(string $mention): string;

    public function isValidMention(string $mention): bool;

    public function isValidUsername(string $username): bool;
}
