<?php

namespace Yaraplus\IntegrationClient\Instagram\Services;

use Throwable;
use Yaraplus\IntegrationClient\Exceptions\IntegrationClientException;
use Yaraplus\IntegrationClient\Instagram\Abstractions\InstagramService;
use Yaraplus\IntegrationClient\Instagram\Interfaces\PostInterface;
use Yaraplus\IntegrationClient\Instagram\Models\CarouselPost;
use Yaraplus\IntegrationClient\Instagram\Models\SinglePost;
use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

class Post extends InstagramService implements PostInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByCode(string $code): ModelInterface
    {
        $result = $this->getClient()->sendRequest(
			'/instagram/post',
			compact('code')
		);
		
		if (array_key_exists('items', $result->data)) {
			return new CarouselPost($result->data);
		}
		
		return new SinglePost($result->data);
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
