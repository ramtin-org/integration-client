<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

interface PostInterface
{
    public function findByCode(string $code): ModelInterface;

    public function extractCodeFromUrl(string $url): string;

    public function isValidUrl(string $url): bool;
}
