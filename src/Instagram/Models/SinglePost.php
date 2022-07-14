<?php

namespace Yaraplus\IntegrationClient\Instagram\Models;

use Yaraplus\IntegrationClient\Instagram\Interfaces\MediaInterface;

class SinglePost extends Post
{
	public function getMedia(): MediaInterface
	{
		return new Media($this->data->media);
	}
}
