<?php

class Question extends Eloquent {
    
    /**
     * Fillable fields for a new Question
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A question belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * A question belongs to a session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo('Session');
    }

}