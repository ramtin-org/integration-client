<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

interface StoryInterface
{
    public function find(int $id, string $username): ModelInterface;

    public function extractIdFromUrl(string $url): int;

    public function extractUsernameFromUrl(string $url): string;

    public function isValidUrl(string $url): bool;
}
