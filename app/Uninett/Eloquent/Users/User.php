<?php namespace Uninett\Eloquent\Users;

use Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Illuminate\Support\Facades\Hash;
use Uninett\Users\Registration\Events\UserHasRegistered;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = ['email','password', 'confirmation_code', 'confirmed'];


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
     * A user has many personal schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalSchedules()
    {
        return $this->hasMany('Uninett\Eloquent\Schedules\PersonalSchedule');
    }

    /**
     * A user has many questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('Uninett\Eloquent\Questions\Question');
    }

    /**
     * A user has many ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany('Uninett\Eloquent\Ratings\Rating');
    }

    /**
     * A user has many newsposts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsposts()
    {
        return $this->hasMany('Uninett\Eloquent\Newsposts\Newspost');
    }

    /**
     * A user has many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('Uninett\Eloquent\Messages\Message');
    }

    /**
     * A user belongs to many groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('Uninett\Eloquent\Groups\Group')->withTimestamps();
    }

    /**
     * A user belongs to many roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('Uninett\Eloquent\Roles\Role');
    }

    /**
     * A user belongs to many chats
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function chats()
    {
        return $this->morphToMany('Uninett\Eloquent\Chats\Chat', 'chatable')->withTimestamps();
    }

}
