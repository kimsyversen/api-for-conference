<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		Laracasts\TestDummy\Factory::$factoriesPath = 'app/tests/factories';

		return require __DIR__.'/../../bootstrap/start.php';
	}

}
