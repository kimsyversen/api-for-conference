<?php namespace Uninett\Eloquent\Newsfeeds;

use Eloquent;

class Newsfeed extends Eloquent {
    
    /**
     * Fillable fields for a new Newsfeed
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A newsfeed belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Uninett\Eloquent\Conferences\Conference');
    }

    /**
     * A newsfeed has many newsposts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsposts()
    {
        return $this->hasMany('Uninett\Eloquent\Newsposts\Newspost');
    }

}