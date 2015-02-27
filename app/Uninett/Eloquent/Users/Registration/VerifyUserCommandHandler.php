<?php namespace Uninett\Users\Registration;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Users\Repositories\UserRepository;
use Uninett\Exceptions\VerifyUserException;
use Uninett\Users\Registration\Events\UserHasBeenVerified;

use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Http\Response as HttpResponse;
use Log;
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
		$code = $command->confirmation_code;

		$user = $this->repository->verify($code);

		if(is_bool($user) || is_null($user))
			throw new VerifyUserException('Verification code expired.', 'Verification code expired.', HttpResponse::HTTP_PRECONDITION_FAILED);

		$verifiedUser = new UserHasBeenVerified($user);

		$user->raise($verifiedUser);

		$this->dispatchEventsFor($user);

		Log::info('Verified new user');

		return $user;
	}
} 