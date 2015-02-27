<?php namespace Uninett\Users\Registration;


use ErrorException;
use GuzzleHttp\Event\RequestEvents;
use Illuminate\Database\QueryException;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Log;
use Request;


use Uninett\Eloquent\Users\Repositories\UserRepository;
use Uninett\Eloquent\Users\User;
use Uninett\Validation\UserValidator;


class RegisterUserCommandHandler implements  CommandHandler {

	use DispatchableTrait;

	private $validator;
	protected $repository;

	function __construct(UserValidator $validator, UserRepository $repository)
	{
		$this->validator = $validator;
		$this->repository = $repository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$this->validator->isValid(Request::all());

		$confirmation_code = str_random(40);

		$user = User::register($command->username, $command->email, $command->password, $confirmation_code);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		Log::info('Created new user');

		return $user;
	}

} 