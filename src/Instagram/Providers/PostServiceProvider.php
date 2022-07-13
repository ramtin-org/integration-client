<?php

namespace Yaraplus\IntegrationClient\Instagram\Providers;

use Illuminate\Support\ServiceProvider;
use Yaraplus\IntegrationClient\Instagram\Interfaces\PostInterface;

class PostServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
		$this->app->bind(
			PostInterface::class,
			config('instagram-integration-client.services.post')
		);
    }
	
	public function provides()
	{
		return [PostInterface::class];
	}
}
