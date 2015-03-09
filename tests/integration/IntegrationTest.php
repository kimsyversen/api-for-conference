<?php 
class IntegrationTest extends \Codeception\TestCase\Test {

	public function cleanDatabase()
	{
		$seeder = new DatabaseSeeder();
		$seeder->cleanDatabase();
	}

}