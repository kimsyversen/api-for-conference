<?php

use Uninett\Api\Transformers\UserTransformer;
use Uninett\Users\Registration\RegisterUserCommand;
use Uninett\Users\Registration\VerifyUserCommand;

class RegistrationController extends ApiController {
	private $transform;

	function __construct(UserTransformer $transform)
	{
		$this->transform = $transform;
	}

	public function store()
	{
		$user = $this->execute(RegisterUserCommand::class);

		if($user)
			return $this->respondCreated(['Account was successfully created. You must now verify it. Please check your email inbox or spam folder for email.']);

		return $this->respondWithError('Something went wrong.');

	}

	public function verify($confirmation_code)
	{
		$user = $this->execute(VerifyUserCommand::class, ['confirmation_code' => $confirmation_code] );

		if(!$user)
			return $this->respondWithError([
				'message' => 'Something went wrong when verifying user'
			]);

		return $this->respond([
			'data' => $this->transform->transform($user->toArray())
		]);

	}
}