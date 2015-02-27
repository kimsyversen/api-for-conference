<?php

use DebugBar\DebugBar;
use Uninett\Api\Requests\LogRequestCommand;
use Uninett\Api\Transformers\UserTransformer;
use Uninett\Eloquent\Statistics\Statistic;
use Uninett\Eloquent\Users\User;

class UsersController extends ApiController {
	private $transform;

	function __construct(UserTransformer $transform)
	{
		$this->transform = $transform;
	}

	public function getMe()
	{
		$user_id = $this->getUserId();

		$user = User::where('id', '=', $user_id)->get()->first();

/*		if(!$user)
			return $this->respondNotFound([
				'message' => 'User was not found'
			]);*/

		return $this->respond([
			'data' => $this->transform->transform($user->toArray())
		]);
	}

	public function getUserById($id)
	{
		$user = User::findOrFail($id);

		return $this->respond([
			'data' => $this->transform->transform($user->toArray())
		]);
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