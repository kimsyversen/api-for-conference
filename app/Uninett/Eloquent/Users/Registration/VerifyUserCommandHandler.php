<?php namespace Uninett\Users\Registration;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Users\Repositories\UserRepository;

class VerifyUserCommandHandler implements  CommandHandler{

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
		$user = $this->repository->verify($command->confirmation_code);

		$this->dispatchEventsFor($this->repository);

		return $user;
	}
} 