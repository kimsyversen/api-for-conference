<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use DatabaseSeeder;
use Faker\Factory as Faker;
class IntegrationHelper extends \Codeception\Module
{

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
