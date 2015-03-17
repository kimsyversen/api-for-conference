<?php

use Faker\Factory as Faker;

abstract class ApiTester extends \tests\TestCase {

    /**
     * @var Faker
     */
    protected $fake;

	/**
	 * The base url for the api
	 * @var
	 */
	protected $base_url;

    private function buildUrl($url)
    {
        return $this->base_url.$url;
    }


    public function setUp()
	{
		parent::setUp();

        Route::enableFilters();

        $this->prepareDatabase();

        $this->fake = Faker::create();

        $this->base_url = Config::get('uninett.base_url');
	}

    /**
     * Prepare the database for a new test
     */
    private function prepareDatabase()
    {
        // Clean the database
        $seed = new DatabaseSeeder();
        $seed->cleanDatabase();

        // Add oauth client secrets
        $values = [1, 'asdf', 'browser', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')];
        DB::insert('insert into oauth_clients (id, secret, name, created_at, updated_at) values (?, ?, ?, ?, ?)', $values);

        // Seed the database manually?
        //Artisan::call('db:seed');
        //\Laracasts\TestDummy\Factory::$databaseProvider = new CustomBuilder;
    }


    /**
     * @param $uri
     * @param string $method
     * @param array $body
     * @param array $header
     * @param bool $returnArray
     * @return mixed
     */
    protected function getJson($uri, $method = 'GET', $body = [], $header = [], $returnArray = false)
	{
        $uri = $this->buildUrl($uri);

		return json_decode($this->call($method, $uri, $body, [], $header, null, true)->getContent(), $returnArray);
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

	protected function getClientSecrets()
	{
		return [
			'client_id' => 1,
			'client_secret' => 'asdf',
			'grant_type' => 'password'
		];
	}

    /**
     * Get OAuth2 access token
     *
     * @param $email
     * @param $password
     * @return mixed
     */
    protected function getAccesstoken($email, $password)
    {
        $data = array_merge([
            'username' => $email,
            'password' => $password
        ], $this->getClientSecrets());

        return $this->getJson('oauth/access_token', 'POST', $data, [], true)['access_token'];
    }

}