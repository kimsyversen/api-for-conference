<?php namespace Uninett\Providers;
use Illuminate\Support\ServiceProvider;

class LocalServiceProvider extends ServiceProvider{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Uninett\Mailers\MailerInterface', 'Uninett\Api\Mailers\UserMailer');
	}

}