<?php

namespace Yaraplus\IntegrationClient\Instagram\Models;

class CarouselPost extends Post
{
	public function getItems(): array
	{
		return array_map(
			fn ($item) => new PostItem($item),
			$this->data->items
		);
	}
}
