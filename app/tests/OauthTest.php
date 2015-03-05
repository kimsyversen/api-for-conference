<?php
use Uninett\Eloquent\Users\User;
use Laracasts\TestDummy\Factory as TestDummy;

class OauthTest extends ApiTester {

	public function setUp()
	{
		parent::setUp();
	}

	/** @test  */
	public function test_get_access_token_with_correct_credentials()
	{
		$this->call('POST', "oauth/access_token", $this->getParametersToAquireAccesstoken());

		$this->assertResponseStatus(200);
	}

	/** @test  */
	/**
	 * @expectedException League\OAuth2\Server\Exception\InvalidCredentialsException
	 */
	public function test_not_getting_access_token_with_incorrect_credentials()
	{
		$parameters = $this->getParametersToAquireAccesstoken();

		$parameters['username'] = 'NoNexistingUser@example.com';

		$this->call('POST', "oauth/access_token", $parameters);

	}
}