<?php

use Uninett\Api\Responders\Responder;
use Uninett\Api\Transformers\UserTransformer;
use Uninett\Eloquent\Users\User;

class UsersController extends ApiController {
	private $transform;

	function __construct(UserTransformer $transformer, Responder $responder)
	{
		parent::__construct($responder);

		$this->transform = $transformer;
	}

	public function getMe()
	{
		$user_id = $this->getUserId();

		$user = User::findOrFail($user_id);

		return $this->responder->respond($this->transform->transform($user->toArray()));
	}

	public function getUserById($id)
	{
		$user = User::findOrFail($id);

		return $this->responder->respond($this->transform->transform($user->toArray()));
	}
}