<?php namespace Uninett\Eloquent\Schedules;

use Eloquent;

abstract class Schedule extends Eloquent {
    
    /**
     * Fillable fields for a new Schedule
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A schedule belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Uninett\Eloquent\Conferences\Conference');
    }

    /**
     * A schedule has many sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function sessions()
    {
        return $this->morphToMany('Uninett\Eloquent\Sessions\Session', 'schedulable')->withTimestamps();
    }
}