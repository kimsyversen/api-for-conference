<?php namespace Uninett\Eloquent\Sessions;

use Carbon\Carbon;
use Eloquent;

class Session extends Eloquent {
    
    /**
     * Fillable fields for a new Session
     *
     * @var array
     */
    protected $fillable = [];

    public function getStartTimeAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    /**
     * A session may exist in many schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function schedulable()
    {
        return $this->morphTo();
    }

    /**
     * A session may exist in many personal schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function personalSchedules()
    {
        return $this->morphedByMany('Uninett\Eloquent\Schedules\PersonalSchedule', 'schedulable')->withTimestamps();
    }

    /**
     * A session may exist in many conference schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function conferenceSchedules()
    {
        return $this->morphedByMany('Uninett\Eloquent\Schedules\ConferenceSchedule', 'schedulable')->withTimestamps();
    }

    /**
     * A session belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Uninett\Eloquent\Conferences\Conference');
    }

    /**
     * A session has many questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('Uninett\Eloquent\Questions\Question');
    }

    /**
     * A session has many ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ratings()
    {
        return $this->morphMany('Uninett\Eloquent\Ratings\Rating', 'ratable');
    }
}