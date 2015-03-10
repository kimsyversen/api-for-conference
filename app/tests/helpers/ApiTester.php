<?php
use Faker\Factory as Faker;
use tests\helpers\CustomBuilder;

abstract class ApiTester extends tests\TestCase {

    /**
     * @var Faker
     */
    protected $fake;

	/**
	 * The base url for the api
	 * @var
	 */
	protected $base_url;


    /**
     *
     */
    function __construct()
	{
		$this->fake = Faker::create();
	}


    public function setUp()
	{
		parent::setUp();

        // Seed the database manually?
		//Artisan::call('db:seed');

        \Laracasts\TestDummy\Factory::$databaseProvider = new CustomBuilder;

		//$seed = new DatabaseSeeder();
		//$seed->cleanDatabase();
	}

    /**
     * @param $uri
     * @param string $method
     * @param array $parameters
     * @param bool $returnArray
     * @return mixed
     */
    protected function getJson($uri, $method = 'GET', $parameters = [], $returnArray = false)
	{
		return json_decode($this->call($method, $uri, $parameters)->getContent(), $returnArray);
	}

    /**
     * Assert object has any number of attributes
     */
    protected function assertObjectHasAttributes()
	{
		$args = func_get_args();

		$object = array_shift($args);

		foreach ($args as $attribute)
        {
            $this->assertObjectHasAttribute($attribute, $object);
        }
	}

	protected function getSecrets()
	{
		return [
			'client_id' => 1,
			'client_secret' => 'asdf',
			'grant_type' => 'password'
		];
	}

}