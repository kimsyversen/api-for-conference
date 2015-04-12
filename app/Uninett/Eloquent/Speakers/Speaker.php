<?php namespace Uninett\Eloquent\Speakers;

use Eloquent;

class Speaker extends Eloquent {
    
    /**
     * Fillable fields for a new Speaker
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A speaker belongs to a session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo('Uninett\Eloquent\Sessions\Session');
    }
}