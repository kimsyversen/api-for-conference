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
	public static function register($username, $email, $password, $confirmation_code = null)
	{
		$user = new static(compact('username', 'email', 'password', 'confirmation_code'));

		$user->raise(new UserHasRegistered($user));

		return $user;
	}

    /**
     * A user has many personal schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalSchedules()
    {
        return $this->hasMany('PersonalSchedule');
    }

    /**
     * A user has many questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('Question');
    }

    /**
     * A user has many ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('Rating');
    }

    /**
     * A user has many newsposts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsposts()
    {
        return $this->hasMany('Newspost');
    }

    /**
     * A user has many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('Message');
    }

    /**
     * A user belongs to many groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('Group');
    }

    /**
     * A user belongs to many roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('Role');
    }

}
