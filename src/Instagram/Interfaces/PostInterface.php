<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

interface PostInterface
{
    public function findByCode(string $code): object;

    public function extractCodeFromUrl(string $url): string;

    public function isValidUrl(string $url): bool;
}
