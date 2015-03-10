<?php namespace tests;

use Laracasts\TestDummy\Factory;

class TestCase extends \Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		Factory::$factoriesPath = 'app/tests/factories';

		return require __DIR__.'/../../bootstrap/start.php';
	}

}
