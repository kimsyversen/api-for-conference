<?php


class UsersTest extends OAuthApiTester {

	private $token = null;
	public function setUp()
	{
		parent::setUp();
		Route::enableFilters();

		$this->token = $this->getAccessToken();
	}



	/** @test */
	public function it_can_retrieve_me()
	{

		dd($this->getAccessToken()->access_token);


		//$response = $this->getJson($this->basePath . 'users/me', $parameters)->data;

		$response = $this->call('GET', $this->basePath . 'users/me', $parameters);

		$this->assertResponseOk();

		$this->assertNotEmpty($response);


	}
}

