<?php

use Laracasts\TestDummy\Factory as TestDummy;

class UsersTest extends ApiTester {

	/** @test */
	public function it_can_retrieve_me()
	{
        TestDummy::create('my_user');

        $accessToken = $this->getAccesstoken('me@example.com', 'secret');

		$response = $this->getJson('api/v1/users/me', 'GET', [], [
            'HTTP_Authorization' => $accessToken
        ]);

		$this->assertResponseOk();

		$this->assertNotEmpty($response);
	}

	/**
	 * @test
	 * @expectedException League\OAuth2\Server\Exception\AccessDeniedException
	 */
	public function it_can_not_retrieve_me_if_wrong_access_token()
	{
        TestDummy::create('my_user');

		$this->getJson('api/v1/users/me', 'GET', [], [
            'HTTP_Authorization' => '123'
        ]);
	}

    /** @test */
	public function it_can_register_a_new_user()
	{
		$formData = [
			'email' => 'truddelutt@truddelutt.no',
			'password' => 'secret',
			'password_confirmation' => 'secret',
		];

		$response = $this->getJson('register', 'POST', $formData);

        $this->assertResponseStatus(201);

        $this->assertEquals('Account was successfully created.', $response->data);
	}

	/**
	 * @test
	 * @expectedException \Uninett\Exceptions\FormValidationException
	 */
	public function it_throws_exception_if_email_already_exists()
	{
		TestDummy::create('Uninett\Eloquent\Users\User', [
            'email' => 'truddelutt@truddelutt.no',
            'password' => 'secret',
        ]);

        $formData = [
            'email' => 'truddelutt@truddelutt.no',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];

		$this->getJson('register', 'POST', $formData);
	}


}

