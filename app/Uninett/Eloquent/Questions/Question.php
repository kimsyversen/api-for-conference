<?php namespace Uninett\Eloquent\Questions;

use Eloquent;

class Question extends Eloquent {
    
    /**
     * Fillable fields for a new Question
     *
     * @var array
     */
    protected $fillable = ['user_id', 'text', 'session_id'];

    /**
     * A question belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Uninett\Eloquent\Users\User');
    }

    /**
     * A question belongs to a session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo('Uninett\Eloquent\Sessions\Session');
    }

}