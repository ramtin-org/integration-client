<?php

namespace Yaraplus\IntegrationClient\Instagram\Services;

use Throwable;
use Yaraplus\IntegrationClient\Exceptions\IntegrationClientException;
use Yaraplus\IntegrationClient\Instagram\Abstractions\InstagramService;
use Yaraplus\IntegrationClient\Instagram\Interfaces\AccountInterface;

class Account extends InstagramService implements AccountInterface
{
	/**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByUsername(string $username): object
    {
        return $this->getClient()->sendRequest(
			'/instagram/account/profile',
			compact('username')
		);
    }

    /**
     * @throws IntegrationClientException
     */
    public function extractUsernameFromMention(string $mention): string
    {
        preg_match('/^@((?!.*\.\.)(?!.*\.$)\w[\w.]{0,29})$/', $mention, $matches);

        if (count($matches) === 2 && !empty($matches[1])) {
            return $matches[1];
        }

        throw new IntegrationClientException('Cannot extract username from specified mention text.');
    }

    public function isValidMention(string $mention): bool
    {
        try {
            return str_starts_with($mention, '@') && $this->isValidUsername($mention);
        }
        catch (Throwable) {
            return false;
        }
    }

    public function isValidUsername(string $username): bool
    {
        return (bool) preg_match('/^(?!.*\.\.)(?!.*\.$)\w[\w.]{0,29}$/', $username);
    }
}
