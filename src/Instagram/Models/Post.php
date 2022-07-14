<?php

namespace Yaraplus\IntegrationClient\Instagram\Models;

use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

class Post implements ModelInterface
{
	public function __construct(public object $data)
	{
		//
	}
	
	public function getCaption(): ?string
	{
		return $this->data->caption;
	}
}
