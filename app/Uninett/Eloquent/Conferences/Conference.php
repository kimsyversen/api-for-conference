<?php namespace Uninett\Eloquent\Conferences;

use Eloquent;

class Conference extends Eloquent {

    /**
     * Fillable fields for a new Conference
     *
     * @var array
     */
	protected $fillable = [];


    /**
     * A conference has many conference schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conferenceSchedules()
    {
        return $this->hasMany('Uninett\Eloquent\Schedule\ConferenceSchedule');
    }

    /**
     * A conference has many personal schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalSchedules()
    {
        return $this->hasMany('Uninett\Eloquent\Schedule\PersonalSchedule');
    }

    /**
     * A conference has many sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions()
    {
        return $this->hasMany('Uninett\Eloquent\Sessions\Session');
    }

    /**
     * A conference has many maps
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maps()
    {
        return $this->hasMany('Uninett\Eloquent\Maps\Map');
    }

    /**
     * A conference has many has many ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ratings()
    {
        return $this->morphMany('Uninett\Eloquent\Ratings\Rating', 'ratable');
    }

    /**
     * A conference has many newsfeeds
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsfeeds()
    {
        return $this->hasMany('Uninett\Eloquent\Newsfeeds\Newsfeed');
    }

    /**
     * A conference has many chats
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chats()
    {
        return $this->hasMany('Uninett\Eloquent\Chats\Chat');
    }

    /**
     * A conference has many groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany('Uninett\Eloquent\Groups\Group');
    }
}