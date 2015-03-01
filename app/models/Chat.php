<?php

class Chat extends Eloquent {
    
    /**
     * Fillable fields for a new Chat
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A chat has many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('Message');
    }

    /**
     * A chat belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Conference');
    }

    // A chat can have both individual users as well as groups as recipients.
    //TODO: Add the possibility to include individual users in the chat recipients list
    /**
     * A chat has group recipients
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('Grpup');
    }

}