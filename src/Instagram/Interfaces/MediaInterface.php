<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

use Yaraplus\IntegrationClient\Instagram\Enum\MediaType;

interface MediaInterface
{
	public function getType(): MediaType;
	
	public function getUrl(): string;
}
