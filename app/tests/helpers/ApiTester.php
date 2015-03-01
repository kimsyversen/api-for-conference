<?php
use Faker\Factory as Faker;


abstract class ApiTester extends TestCase {

	protected $fake;

	/**
	 * The base url for the api
	 * @var
	 */
	protected $base_url;



	function __construct()
	{
		$this->fake = Faker::create();
	}

	public function setUp()
	{
		parent::setUp();

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

	public function getStub()
	{
		throw new BadMethodCallException('Create your own getStub method to declare your fields');
	}

	/**
	 * @return array
	 */
	protected function getParametersToAquireAccesstoken()
	{
		return 	[
			'client_id' => 1,
			'client_secret' => 'asdf',
			'username' => 'user@example.com',
			'password' => 'secret',
			'grant_type' => 'password'
		];
	}
}