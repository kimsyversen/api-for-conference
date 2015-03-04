<?php namespace tests; 
class RegisterUserTest extends \ApiTester {


	public function setUp()
	{
		parent::setUp();
	}


	/**
	 * @test
	 * @expectedException \Illuminate\Database\QueryException
	 */
	public function it_throws_queryexception_if_username_or_email_already_exists()
	{
		$newUser = [
			'username' => 'admin',
			'email' => 'admin@example.com',
			'password' => 'secret',
			'client_id' => 1,
			'client_secret' => 'asdf',
			'grant_type' => 'password'
		];

		$this->getJson('register', 'POST', $newUser)->data;
	}
}