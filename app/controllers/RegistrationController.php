<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\UserTransformer;
use Uninett\Users\Registration\RegisterUserCommand;
use Uninett\Users\Registration\VerifyUserCommand;

class RegistrationController extends ApiController {

	private $transform;

	function __construct(UserTransformer $transformer, Responder $responder)
	{
		parent::__construct($responder);

		$this->transform = $transformer;
	}

	public function store()
	{
		$user = $this->execute(RegisterUserCommand::class);

		return $this->responder->respondCreated('Account was successfully created.');

		//return $this->respondWithError('Something went wrong.');
	}

	public function verify($confirmation_code)
	{
		$user = $this->execute(VerifyUserCommand::class, ['confirmation_code' => $confirmation_code] );

		return $this->responder->respond($this->transform->transform($user->toArray()));

	}
}