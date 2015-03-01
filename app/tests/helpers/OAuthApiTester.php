<?php
class OAuthApiTester extends ApiTester {

	/**
	 * Access token
	 * @var
	 */
	protected $access_token;

	protected $base_url;

	/**
	 * Get OAuth2 access token
	 * {
		"access_token": "nkpm1CrxR7tWMK7kueVYy0H7Mmp8egP40lGgQNez",
		"token_type": "Bearer",
		"expires_in": 3600
		}
	 * @return mixed
	 */
	protected function setupAccesstoken()
	{
		$response = $this->call('POST', "oauth/access_token", $this->getParameteresToAquireAccesstoken());

		$this->access_token = json_decode($response->getContent(), true);

		return $this->access_token;
	}
}