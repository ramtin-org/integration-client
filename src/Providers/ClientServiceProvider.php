<?php

namespace Yaraplus\IntegrationClient\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Yaraplus\IntegrationClient\Interfaces\ClientInterface;

class ClientServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
		$this->mergeConfigFrom(__DIR__.'/../config/integration-client.php', 'integration-client');
		
        $this->app->bind(
            ClientInterface::class,
            fn () => $this->app
                ->make(config('integration-client.services.client'))
                ->setApiKey(config('services.integration_client.api_key'))
        );
    }
	
	public function provides()
	{
		return [ClientInterface::class];
	}
}
