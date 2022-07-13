<?php

namespace Yaraplus\IntegrationClient\Services;

use Yaraplus\IntegrationClient\Interfaces\ClientInterface;

class Client implements ClientInterface
{
    public string $apiKey;
    public \GuzzleHttp\ClientInterface $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.instagram.yaraplus.agency',
            'timeout' => 60_000,
            'allow_redirects' => true
        ]);
    }

    public function setApiKey(string $apiKey): static
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function sendRequest(string $path, array $payload): object
    {
        $response = $this->client->post($path, [
            'body' => $payload,
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->apiKey)
            ]
        ]);

        return json_decode(
            $response->getBody()->getContents()
        );
    }
}
