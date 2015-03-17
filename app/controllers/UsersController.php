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

		$user = User::find($user_id);

		return $this->responder->respond($this->transform->transform($user->toArray()));
	}

	public function getUserById($id)
	{
		$user = User::findOrFail($id);

		return $this->responder->respond($this->transform->transform($user->toArray()));
	}

	public function asdf()
	{
		/**
		 * TODO: Hvor skal dette legges?
		 * Ser for meg at det kunne ligge i ApiController, men da må vi sende noe opp til den med parent::__construct ...
		 * Lage event av det og lytte på det?
		 */
/*		$request  = [
			'request' => Request::getRequestUri()
		];

		$this->execute(LogRequestCommand::class, $request);*/

		return View::make('hello');
	}
}