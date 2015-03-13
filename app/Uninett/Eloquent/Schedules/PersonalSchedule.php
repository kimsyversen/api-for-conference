<?php namespace Uninett\Eloquent\Schedules;

class PersonalSchedule extends Schedule {

    /**
     * Fillable fields for a new PersonalSchedule
     *
     * @var array
     */
	protected $fillable = ['conference_id'];

    /**
     * A personal schedule belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Uninett\Eloquent\Users\User');
    }
}