<?php
class OAuthApiTester extends ApiTester {

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


}