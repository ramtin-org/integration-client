<?php

namespace Yaraplus\IntegrationClient\Instagram\Providers;

use Illuminate\Support\ServiceProvider;
use Yaraplus\IntegrationClient\Instagram\Interfaces\StoryInterface;

class StoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->bind(
			StoryInterface::class,
            config('instagram-integration-client.services.story')
        );
    }
	
	public function provides()
	{
		return [StoryInterface::class];
	}
}
