<?php namespace tests; 
use Config;
use Route;

class UsersTest extends \ApiTester{


	public function setUp()
	{
		parent::setUp();

		//$this->prepareTheDatabase();
	}

	/** @test */
	public function it_can_retrieve_users_by_username()
	{
		$user = $this->getJson(Config::get('uninett.api') . 'users/me')->data;

		$this->assertResponseOk();

	}
}

