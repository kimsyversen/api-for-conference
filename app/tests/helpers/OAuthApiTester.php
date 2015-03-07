<?php
class OAuthApiTester extends ApiTester {

    private $user = [
        'client_id' => 1,
        'client_secret' => 'asdf',
        'username' => 'admin@example.com',
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
	protected function getAccesstoken()
	{
        return $this->getJson('oauth/access_token', 'POST', $this->user, true);
	}

    protected function user($email)
    {
        $this->user = [
            'client_id' => 1,
            'client_secret' => 'asdf',
            'username' => $email,
            'password' => 'secret',
            'grant_type' => 'password'
        ];

        return $this;
    }


}