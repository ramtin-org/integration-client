<?php

namespace Yaraplus\IntegrationClient\Instagram\Models;

use Yaraplus\IntegrationClient\Instagram\Interfaces\MediaInterface;
use Yaraplus\IntegrationClient\Interfaces\ModelInterface;

class HighlightStory implements ModelInterface
{
	public function __construct(public object $data)
	{
		//
	}
	
	public function getMedia(): MediaInterface
	{
		return $this->data->media;
	}
}
