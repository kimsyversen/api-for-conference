<?php

class Session extends Eloquent {
    
    /**
     * Fillable fields for a new Session
     *
     * @var array
     */
    protected $fillable = [];


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
        return $this->morphedByMany('PersonalSchedule', 'schedulable');
    }

    /**
     * A session may exist in many conference schedules
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function conferenceSchedules()
    {
        return $this->morphedByMany('ConferenceSchedule', 'schedulable');
    }

    /**
     * A session belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Conference');
    }

    /**
     * A session has many questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('Question');
    }

    /**
     * A session has many ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ratings()
    {
        return $this->morphMany('Rating', 'ratable');
    }
}