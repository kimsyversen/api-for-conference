<?php namespace Uninett\Eloquent\Newsposts;

use Eloquent;

class Newspost extends Eloquent {
    
    /**
     * Fillable fields for a new Newspost
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A newspost belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Uninett\Eloquent\User\User');
    }

    /**
     * A newspost belongs to a newsfeed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsfeed()
    {
        return $this->belongsTo('Uninett\Eloquent\Newsfeeds\Newsfeed');
    }

}