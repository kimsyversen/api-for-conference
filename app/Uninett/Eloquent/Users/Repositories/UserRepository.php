<?php namespace Uninett\Eloquent\Users\Repositories;

use Uninett\Eloquent\Users\User;


class UserRepository {

	public function save(User $user)
	{
        // TODO: Kan vi fjerne denne?
		if($user->confirmation_code === null)
			$user->confirmed = 1;

		return $user->save();
	}

	public function verify($confirmation_code)
	{
		if(!$confirmation_code)
			return false;

		$user = User::where('confirmation_code', '=', $confirmation_code)->get()->first();

		if (! $user)
			return false;

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

		return $user;
	}


} 