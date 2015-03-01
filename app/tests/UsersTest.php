<?php


class UsersTest extends OAuthApiTester {
	public function setUp()
	{
		parent::setUp();

		$this->setupAccesstoken();

		Route::enableFilters();
	}



	/** @test */
	public function it_can_retrieve_me()
	{
		$response = $this->getJson(Config::get('uninett.rooturi') . 'users/me', 'GET', $this->access_token)->data;

		$this->assertResponseOk();

		$this->assertNotEmpty($response);
	}

	/** @test */
	/**
	 * @expectedException League\OAuth2\Server\Exception\AccessDeniedException
	 */
	public function it_can_not_retrieve_me_if_wrong_access_token()
	{
		$tull = [
			'access_token' => '123'
		];

		$this->getJson(Config::get('uninett.rooturi') . 'users/me', 'GET', $tull)->data;
	}

	/** @test */
	public function it_can_retrieve_user_by_id()
	{
		$response = $this->getJson(Config::get('uninett.rooturi') . 'users/1', 'GET', $this->access_token)->data;

		$this->assertResponseOk();

		$this->assertNotEmpty($response);
	}
}

