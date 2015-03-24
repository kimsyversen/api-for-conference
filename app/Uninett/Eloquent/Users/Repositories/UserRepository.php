<?php namespace Uninett\Eloquent\Users\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Users\User;
use Uninett\Exceptions\VerifyUserException;
use Uninett\Users\Registration\Events\UserHasBeenVerified;
use Uninett\Users\Registration\Events\UserHasRegistered;
use Illuminate\Http\Response as HttpResponse;

class UserRepository {

    use EventGenerator;

	public function verify($confirmation_code)
	{
		$user = User::where('confirmation_code', $confirmation_code)->get()->first();

		if (! $user) throw new VerifyUserException('Verification code expired.', 'Verification code expired.', HttpResponse::HTTP_PRECONDITION_FAILED);

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

        $this->raise(new UserHasBeenVerified($user));

		return $user;
	}

    public function register($email, $password, $confirmation_code)
    {
        $user = User::updateOrCreate(compact('email'), compact('email', 'password', 'confirmation_code'));

        $this->raise(new UserHasRegistered($user));

        return $user;
    }


} 