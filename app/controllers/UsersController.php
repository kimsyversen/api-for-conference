<?php

use Uninett\Api\Transformers\UserTransformer;

class UsersController extends ApiController {
	private $transform;

	function __construct(UserTransformer $transform)
	{
		$this->transform = $transform;
	}

	public function getMe()
	{
		$user_id = Authorizer::getResourceOwnerId();

		$user = User::where('id', '=', $user_id)->get()->first();

		return $user;

		return $this->respond([
			'data' => $this->transform->transform($user->toArray())
		]);

	}
}