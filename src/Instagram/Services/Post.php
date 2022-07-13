<?php

namespace Yaraplus\IntegrationClient\Instagram\Services;

use Throwable;
use Yaraplus\IntegrationClient\Exceptions\IntegrationClientException;
use Yaraplus\IntegrationClient\Instagram\Abstractions\InstagramService;
use Yaraplus\IntegrationClient\Instagram\Interfaces\PostInterface;

class Post extends InstagramService implements PostInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByCode(string $code): object
    {
        return $this->getClient()->sendRequest(
			'/instagram/post',
			compact('code')
		);
    }

    /**
     * @throws IntegrationClientException
     */
    public function extractCodeFromUrl(string $url): string
    {
        preg_match('/^(?:https?:\/\/)?(?:www\.)?(instagram\.com.*\/(?:p|tv)\/)([\d\w\-_]+)(?:\/(?:.*)?|\?(?:.*)?)?$/', $url, $matches);

        if (count($matches) === 2 && !empty($matches[1])) {
            return $matches[1];
        }

        throw new IntegrationClientException('Cannot extract code from specified post URL.');
    }

    public function isValidUrl(string $url): bool
    {
        try {
            return (bool) $this->extractCodeFromUrl($url);
        }
        catch (Throwable) {
            return false;
        }
    }
}
