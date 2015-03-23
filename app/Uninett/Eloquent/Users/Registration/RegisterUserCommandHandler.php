<?php namespace Uninett\Users\Registration;

use Log;
use Uninett\Eloquent\Users\User;
//use Uninett\Validators\UserValidator;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Users\Repositories\UserRepository;

class RegisterUserCommandHandler implements  CommandHandler {

	use DispatchableTrait;

	protected $userRepository;

	function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
        $user = $this->userRepository->register($command->email, $command->password, $command->confirmation_code);

		$this->dispatchEventsFor($this->userRepository);

		return $user;
	}

} 