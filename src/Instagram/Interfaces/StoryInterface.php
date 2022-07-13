<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

interface StoryInterface
{
    public function find(int $id, string $username): object;

    public function extractIdFromUrl(string $url): int;

    public function extractUsernameFromUrl(string $url): string;

    public function isValidUrl(string $url): bool;
}
