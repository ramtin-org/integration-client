<?php

namespace Yaraplus\IntegrationClient\Instagram\Providers;

use Illuminate\Support\ServiceProvider;
use Yaraplus\IntegrationClient\Instagram\Interfaces\AccountInterface;

class AccountServiceProvider extends ServiceProvider implements DeferrableProvider
{
	public function register()
	{
		$this->app->bind(
			AccountInterface::class,
			config('instagram-integration-client.services.account')
		);
	}
	
	public function provides()
	{
		return [AccountInterface::class];
	}
}
