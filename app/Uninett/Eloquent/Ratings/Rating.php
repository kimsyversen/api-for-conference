<?php namespace Uninett\Eloquent\Ratings;

use Eloquent;

class Rating extends Eloquent {
    
    /**
     * Fillable fields for a new Rating
     *
     * @var array
     */
    protected $fillable = ['user_id', 'score', 'text'];

    /**
     * A rating can belong to a lot of models
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function ratable()
    {
        return $this->morphTo();
    }

    /**
     * A rating belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Uninett\Eloquent\Users\User');
    }

}