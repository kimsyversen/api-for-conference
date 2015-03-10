<?php
class OAuthApiTester extends ApiTester {

    private $user = [
        'client_id' => 1,
        'client_secret' => 'asdf',
        'email' => 'admin@example.com',
        'password' => 'secret',
        'grant_type' => 'password'
    ];


	/**
	 * Get OAuth2 access token
	 * {
		"access_token": "nkpm1CrxR7tWMK7kueVYy0H7Mmp8egP40lGgQNez",
		"token_type": "Bearer",
		"expires_in": 3600
		}
	 * @return mixed
	 */
	protected function getAccesstoken($user)
	{
		$secrets = [
			'client_id' => 1,
			'client_secret' => 'asdf',
			'grant_type' => 'password',

		];

		$userInfo = [
			'username' => $user->email,
			'password' => 'secret'
		];

		$data = array_merge($secrets, $userInfo);

        return $this->getJson('oauth/access_token', 'POST', $data, true);
	}

    protected function user($email)
    {
        $this->user = [

            'email' => $email,
            'password' => 'secret'
        ];

        return $this;
    }


}