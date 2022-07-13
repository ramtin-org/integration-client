<?php

namespace Yaraplus\IntegrationClient\Instagram\Services;

use Throwable;
use Yaraplus\IntegrationClient\Exceptions\IntegrationClientException;
use Yaraplus\IntegrationClient\Instagram\Abstractions\InstagramService;
use Yaraplus\IntegrationClient\Instagram\Interfaces\HighlightInterface;

class Highlight extends InstagramService implements HighlightInterface
{
	public function getStories(int $id): object
	{
		return $this->getClient()->sendRequest(
			'/instagram/highlight/stories',
			compact('id')
		);
	}
	
	/**
	 * @throws IntegrationClientException
	 */
	public function extractIdFromUrl(string $url): int
	{
		preg_match('/^(?:https?:\/\/)?(?:www\.)?instagram\.com\/stories\/highlights\/(\d{17})(?:\/(?:.*)?|\?(?:.*)?)?$/', $url, $matches);
		
		if (count($matches) === 2 && !empty($matches[1])) {
			return $matches[1];
		}
		
		$headers = get_headers($url, true);
		
		if (array_key_exists('Location', $headers) && count($headers['Location'])) {
			$id = $this->extractIdFromUrl(
				$headers['Location'][count($headers['Location']) - 1]
			);
			
			if (!empty($id)) {
				return $id;
			}
		}
		
		throw new IntegrationClientException('Cannot extract code from specified highlight URL.');
	}
	
	public function isValidUrl(string $url): bool
	{
		try {
			return (bool) $this->extractIdFromUrl($url);
		}
		catch (Throwable) {
			return false;
		}
	}
}
