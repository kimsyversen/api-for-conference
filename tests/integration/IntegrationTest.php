<?php
use Faker\Factory as Faker;
class IntegrationTest extends \Codeception\TestCase\Test {

	//TODO: Fjerne?
	protected $faker;

	function __construct()
	{
		$this->faker = Faker::create();

	}

	public function cleanDatabase()
	{
		$seeder = new DatabaseSeeder();
		$seeder->cleanDatabase();
	}

}