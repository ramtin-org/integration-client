<?php

namespace Yaraplus\IntegrationClient\Interfaces;

interface ClientInterface
{
    public function setApiKey(string $apiKey): static;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest(string $path, array $payload): object;
}
