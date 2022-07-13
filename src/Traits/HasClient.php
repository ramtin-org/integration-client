<?php

namespace Yaraplus\IntegrationClient\Traits;

use Yaraplus\IntegrationClient\Interfaces\ClientInterface;

trait HasClient
{
	protected ClientInterface $client;
	
	public function setClient(ClientInterface $client): static
	{
		$this->client = $client;
		
		return $this;
	}
	
	public function getClient(): ClientInterface
	{
		return $this->client;
	}
}