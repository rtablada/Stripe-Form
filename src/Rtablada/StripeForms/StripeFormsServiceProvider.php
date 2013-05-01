<?php namespace Rtablada\StripeForms;

use Illuminate\Support\ServiceProvider;

class StripeFormsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerConnectButtonBuilder();
	}

	protected function registerConnectButtonBuilder()
	{
		$this->app['connectButton'] = $this->app->share(function($app)
		{
			return new ConnectButtonBuilder($app['html'], $app['session']->getToken());
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('connectForm');
	}

}