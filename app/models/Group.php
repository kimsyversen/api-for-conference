<?php

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
        return $this->morphToMany('Chat', 'chatable');
    }

    /**
     * A group belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Conference');
    }

    /**
     * A group belongs to many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('User');
    }

}