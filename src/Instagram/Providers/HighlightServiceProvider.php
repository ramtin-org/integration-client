<?php

namespace Yaraplus\IntegrationClient\Instagram\Providers;

use Illuminate\Support\ServiceProvider;
use Yaraplus\IntegrationClient\Instagram\Interfaces\HighlightInterface;

class HighlightServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->bind(
			HighlightInterface::class,
            config('instagram-integration-client.services.highlight')
        );
    }
	
	public function provides()
	{
		return [HighlightInterface::class];
	}
}
