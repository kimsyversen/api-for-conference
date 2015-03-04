<?php namespace Uninett\Users\Registration;

use Log;
use Uninett\Eloquent\Users\User;
//use Uninett\Validators\UserValidator;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Users\Repositories\UserRepository;


class RegisterUserCommandHandler implements  CommandHandler {

	use DispatchableTrait;

	protected $repository;

	function __construct(UserRepository $repository)
	{
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
		$confirmation_code = str_random(40);
		$user = User::register($command->username, $command->email, $command->password, $confirmation_code);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		Log::info('Created new user');

		return $user;
	}

} 