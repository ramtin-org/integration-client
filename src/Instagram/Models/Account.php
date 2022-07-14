<?php

namespace Yaraplus\IntegrationClient\Instagram\Models;

use Yaraplus\IntegrationClient\Instagram\Interfaces\MediaInterface;
use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

class Account implements ModelInterface
{
	public function __construct(public object $data)
	{
		//
	}
	
	public function getProfile(): MediaInterface
	{
		return new Media($this->data->profile);
	}
	
	public function getBiography(): ?string
	{
		return $this->data->biography;
	}
}
