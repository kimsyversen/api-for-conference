<?php

class RegisterUserTest extends ApiTester {


	public function setUp()
	{
		parent::setUp();
	}

    /** @test */
    public function it_is_a_dummy_test()
    {

    }

//	/** @test */
//	public function it_can_create_new_user()
//	{
//		$data = [
//			'email' => 'truddelutt@truddelutt.no',
//			'password' => 'secret',
//			'password_confirmation' => 'secret',
//		];
//
//		$asdf = array_merge($data, $this->getApiSecrets());
//
//		$this->getJson('register', 'POST', $asdf)->data;
//	}
//	/**
//	 * @test
//	 * @expectedException \Uninett\Exceptions\FormValidationException
//	 */
//	public function it_throws_exception_if_email_already_exists()
//	{
//		$this->it_can_create_new_user();
//
//		$newUser = [
//			'email' => 'truddelutt@truddelutt.no',
//			'password' => 'secret',
//			'password_confirmation' => 'secret',
//			'client_id' => 1,
//			'client_secret' => 'asdf',
//			'grant_type' => 'password'
//		];
//
//		$this->getJson('register', 'POST', $newUser)->data;
//	}
}