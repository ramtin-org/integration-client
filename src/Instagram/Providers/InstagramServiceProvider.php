<?php

namespace Yaraplus\IntegrationClient\Instagram\Providers;

use Illuminate\Support\ServiceProvider;

class InstagramServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/instagram.php', 'instagram-integration-client');
	}
	
	public function boot()
	{
		$this->loadTranslationsFrom(__DIR__.'/../lang', 'instagram-integration-client');
		
		$this->publishes(
			[__DIR__.'/../config/instagram.php' => config_path('instagram-integration-client.php')],
			'instagram-integration-client-config'
		);
		
		$this->publishes(
			[__DIR__.'/../lang' => $this->app->langPath('vendor/instagram-integration-client')],
			'instagram-integration-client-lang'
		);
	}
}
