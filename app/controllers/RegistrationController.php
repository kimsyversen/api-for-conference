<?php

use Uninett\Api\Formatters\OutputFormatter;
use Uninett\Api\Transformers\UserTransformer;
use Uninett\Users\Registration\RegisterUserCommand;
use Uninett\Users\Registration\VerifyUserCommand;

class RegistrationController extends ApiController {
	private $transform;

	function __construct(UserTransformer $transform, OutputFormatter $outputFormatter)
	{
		parent::__construct($outputFormatter);

		$this->transform = $transform;
	}

	public function store()
	{
		$user = $this->execute(RegisterUserCommand::class);


		return $this->respondCreated('Account was successfully created.');

		//return $this->respondWithError('Something went wrong.');

	}

	public function verify($confirmation_code)
	{
		$user = $this->execute(VerifyUserCommand::class, ['confirmation_code' => $confirmation_code] );

		return $this->respond([
			'data' => $this->transform->transform($user->toArray())
		]);

	}
}