<?php namespace Uninett\Users\Registration;


use ErrorException;
use GuzzleHttp\Event\RequestEvents;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Log;
use Request;
use Uninett\Services\UserService;
use Uninett\Users\UserRepository;
use Uninett\Validation\UserValidator;
use Uninett\Validation\ValidationException;
use User;

class RegisterUserCommandHandler implements  CommandHandler{

	use DispatchableTrait;

	private  $validator;
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
		if($this->validator->isValid(Request::all())) {
			try {
				//TOOD: Implementer logikk for å håndetere feil etc.

				$confirmation_code = str_random(40);

				$user = User::register($command->username, $command->email, $command->password, $confirmation_code);

				$this->repository->save($user);

				$this->dispatchEventsFor($user);

				Log::info('Created new user');

				return $user;
			}
			catch(ErrorException $ex) {
				// $ex->getMessage returns only a string,
				// insert it in a array to adhere to the standard return format
				throw new ValidationException('One or more errors occured' . $ex->getMessage(), [$ex->getMessage()] );
			}
		}
	}
} 