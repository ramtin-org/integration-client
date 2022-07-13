<?php

namespace Yaraplus\IntegrationClient\Instagram\Services;

use JetBrains\PhpStorm\ArrayShape;
use Throwable;
use Yaraplus\IntegrationClient\Exceptions\IntegrationClientException;
use Yaraplus\IntegrationClient\Instagram\Abstractions\InstagramService;
use Yaraplus\IntegrationClient\Instagram\Interfaces\StoryInterface;

class Story extends InstagramService implements StoryInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find(int $id, string $username): object
    {
        return $this->getClient()->sendRequest(
			'/instagram/story',
			compact('id', 'username')
		);
    }

    /**
     * @throws IntegrationClientException
     */
    public function extractIdFromUrl(string $url): int
    {
        return $this->extractInfoFromStoryUrl($url)['id'];
    }

    /**
     * @throws IntegrationClientException
     */
    public function extractUsernameFromUrl(string $url): string
    {
        return $this->extractInfoFromStoryUrl($url)['username'];
    }

    /**
     * @throws IntegrationClientException
     */
    #[ArrayShape(['id' => 'int', 'username' => 'string'])]
    public function extractInfoFromStoryUrl(string $url): array
    {
        preg_match('/^(?:https?:\/\/)?(?:www\.)?instagram\.com\/stories\/((?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29})\/(\d{19})(?:\/(?:.*)?|\?(?:.*)?)?$/', $url, $matches);

        if (count($matches) === 3 && !empty($matches[2]) && !empty($matches[1])) {
            return [
                'id' => (int) $matches[2],
                'username' => $matches[1]
            ];
        }

        throw new IntegrationClientException('Cannot extract any information from specified story URL.');
    }

    public function isValidUrl(string $url): bool
    {
        try {
            return (bool) $this->extractInfoFromStoryUrl($url);
        }
        catch (Throwable) {
            return false;
        }
    }
}
