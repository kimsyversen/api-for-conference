<?php namespace Uninett\Users;
use Uninett\Validation\UserValidator;
use User;

/**
 * Class UserRepository
 * @package Larabook\Users
 */
class UserRepository {

	protected $validator;

	function __construct(UserValidator $validator)
	{
		$this->validator = $validator;
	}

	public function save(User $user)
	{
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


	/**
	 * Get paginated list for all users
	 * @param int $howMany
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getPaginated($howMany = 25)
	{
		return User::orderBy('username', 'asc')->paginate($howMany);
	}


	/**
	 * @param $userName
	 * @return \Illuminate\Database\Eloquent\Model|null|static
	 */
	public function findByUsername($userName)
	{
		return User::with('statuses')->where('username', '=', $userName)->first();
	}

	public function findById($id)
	{
		return User::findOrFail($id);
	}

} 