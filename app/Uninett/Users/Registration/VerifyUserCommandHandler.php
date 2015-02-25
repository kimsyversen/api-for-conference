<?php namespace Uninett\Users\Registration;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Log;
use Uninett\Users\Registration\Events\UserHasBeenVerified;
use Uninett\Users\Registration\Events\UserHasRegistered;
use Uninett\Users\UserRepository;
use User;
use Laracasts\Commander\Events\EventGenerator;
class VerifyUserCommandHandler implements  CommandHandler{

	use DispatchableTrait, EventGenerator;

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
		//TODO: Forbedre?
		$code = $command->confirmation_code;

		if(!is_string($code))
			return false;

		$user = $this->repository->verify($code);

		if(is_bool($user))
			return false;

		$verifiedUser = new UserHasBeenVerified($user);

		if(!$verifiedUser)
			return false;

		$user->raise($verifiedUser);

		$this->dispatchEventsFor($user);

		Log::info('Verified new user');

		return $user;
	}


} 