<?php

namespace Yaraplus\IntegrationClient\Interfaces;

interface HasClientInterface
{
	public function setClient(ClientInterface $client): static;
	
	public function getClient(): ClientInterface;
}
