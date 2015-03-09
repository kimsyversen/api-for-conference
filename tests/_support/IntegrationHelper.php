<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use DatabaseSeeder;

class IntegrationHelper extends \Codeception\Module
{

	public function cleanDatabase()
	{
		$seeder = new DatabaseSeeder();
		$seeder->cleanDatabase();
	}
}
