<?php
use Faker\Factory as Faker;
use GuzzleHttp\Client;

abstract class ApiTester extends TestCase {
	protected $fake;
	protected $client;


	protected $basePath = "api/v1/";

	function __construct()
	{
		$this->fake = Faker::create();
	}

	public function setUp()
	{
		parent::setUp();

		Artisan::call('migrate');
		Artisan::call('db:seed');
	}

	protected function getJson($uri, $method = 'GET', $parameters = [])
	{
		return json_decode($this->call($method, $uri, $parameters)->getContent());
	}

	protected function assertObjectHasAttributes()
	{
		$args = func_get_args();

		$object = array_shift($args);

		foreach ($args as $attribute)
			$this->assertObjectHasAttribute($attribute, $object);
	}

	public function getStub() {
		throw new BadMethodCallException('Create your own getStub metod to declare your fields');
	}
}