<?php namespace Uninett\Eloquent\Groups;

use Eloquent;

class Group extends Eloquent {
    
    /**
     * Fillable fields for a new Group
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A group belongs to many chats
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function chats()
    {
        return $this->morphToMany('Uninett\Eloquent\Chats\Chat', 'chatable')->withTimestamps();
    }

    /**
     * A group belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Uninett\Eloquent\Conferences\Conference');
    }

    /**
     * A group belongs to many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Uninett\Eloquent\Users\User')->withTimestamps();
    }

}