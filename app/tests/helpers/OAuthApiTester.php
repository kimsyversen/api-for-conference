<?php
class OAuthApiTester extends ApiTester {

	/**
	 * Get access OAuth2 access token
	 * {
		"access_token": "nkpm1CrxR7tWMK7kueVYy0H7Mmp8egP40lGgQNez",
		"token_type": "Bearer",
		"expires_in": 3600
		}
	 * @return mixed
	 */
	protected function getAccessToken()
	{
		$response = $this->call('POST', "oauth/access_token", $this->getParameteresForGettingAccesstoken());

		return json_decode($response->getContent());
	}
}