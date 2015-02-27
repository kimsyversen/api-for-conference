<?php namespace Uninett\Eloquent\Users;

use Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Users\Registration\Events\UserHasRegistered;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = ['username', 'email','password', 'confirmation_code', 'confirmed'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * Register a new user
	 * @param $username
	 * @param $email
	 * @param $password
	 */
	public static function register($username, $email, $password, $confirmation_code)
	{
		$user = new static(compact('username', 'email', 'password', 'confirmation_code'));

		$user->raise(new UserHasRegistered($user));

		return $user;
	}

}
