<?php

namespace Yaraplus\IntegrationClient\Instagram\Models;

use Yaraplus\IntegrationClient\Instagram\Enum\MediaType;
use Yaraplus\IntegrationClient\Instagram\Interfaces\MediaInterface;

class Media implements MediaInterface
{
	protected string $url;
	protected MediaType $type;
	
	public function __construct(object $data)
	{
		$this->url = $data->url;
		$this->type = MediaType::from($data->type);
	}
	
	public function getUrl(): string
	{
		return $this->url;
	}
	
	public function getType(): MediaType
	{
		return $this->type;
	}
}
