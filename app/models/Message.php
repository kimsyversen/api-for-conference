<?php

class Message extends Eloquent {
    
    /**
     * Fillable fields for a new Message
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A message belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * A message belongs to a chat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chat()
    {
        return $this->belongsTo('Chat');
    }

}