<?php

namespace Yaraplus\IntegrationClient\Instagram\Interfaces;

interface HighlightInterface
{
	public function getStories(int $id): array;
	
	public function extractIdFromUrl(string $url): int;
	
	public function isValidUrl(string $url): bool;
}
