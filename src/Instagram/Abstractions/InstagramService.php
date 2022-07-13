<?php

namespace Yaraplus\IntegrationClient\Instagram\Abstractions;

use Yaraplus\IntegrationClient\Interfaces\ClientInterface;
use Yaraplus\IntegrationClient\Interfaces\HasClientInterface;
use Yaraplus\IntegrationClient\Traits\HasClient;

abstract class InstagramService implements HasClientInterface
{
	use HasClient;
	
	public function __construct(ClientInterface $client = null)
	{
		if ($client) {
			$this->setClient($client);
		}
	}
}
