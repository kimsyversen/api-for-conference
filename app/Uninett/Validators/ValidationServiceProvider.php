<?php namespace Uninett\Validators;

use Illuminate\Support\ServiceProvider;

/**
 * This code is a modification of the validation package
 * authored by Jeffery Way. Source:
 * https://github.com/laracasts/Validation
 */
class ValidationServiceProvider extends ServiceProvider {

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
		$this->app->bind(
			'Uninett\Validators\FactoryInterface',
			'Uninett\Validators\LaravelValidator'
		);
	}

}