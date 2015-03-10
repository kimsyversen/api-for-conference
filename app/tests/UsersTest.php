<?php


class UsersTest extends OAuthApiTester {

	protected $user = 'Uninett\Eloquent\Users\User';

	public function setUp()
	{
		parent::setUp();

		$this->base_url = Config::get('uninett.base_url');

		Route::enableFilters();
	}

	/** @test */
	public function it_can_retrieve_me()
	{
		$user = Laracasts\TestDummy\Factory::create('Uninett\Eloquent\Users\User');

        $accessToken = $this->getAccesstoken($user);

		$response = $this->getJson($this->base_url . 'users/me', 'GET', $accessToken)->data;

		$this->assertResponseOk();

		$this->assertNotEmpty($response);
	}


	/**
	 * @test
	 * @expectedException League\OAuth2\Server\Exception\AccessDeniedException
	 */
	public function it_can_not_retrieve_me_if_wrong_access_token()
	{
		$tull = [
			'access_token' => '123'
		];

		$this->getJson($this->base_url . 'users/me', 'GET', $tull)->data;
	}

//	/** @test */
//	public function it_can_retrieve_user_by_id()
//	{
//        $accessToken = $this->user('admin@example.com')->getAccesstoken();
//
//		$response = $this->getJson($this->base_url . 'users/1', 'GET', $accessToken)->data;
//
//		$this->assertResponseOk();
//
//		$this->assertNotEmpty($response);
//	}




}

