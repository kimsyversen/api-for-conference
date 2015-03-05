<?php namespace tests; 
class RegisterUserTest extends \ApiTester {


	public function setUp()
	{
		parent::setUp();
	}


	/**
	 * @test
	 * @expectedException \Uninett\Exceptions\FormValidationException
	 */
	public function it_throws_exception_if_email_already_exists()
	{
		$newUser = [
			'email' => 'admin@example.com',
			'password' => 'secret',
			'password_confirmation' => 'secret',
			'client_id' => 1,
			'client_secret' => 'asdf',
			'grant_type' => 'password'
		];

		$this->getJson('register', 'POST', $newUser)->data;
	}
}