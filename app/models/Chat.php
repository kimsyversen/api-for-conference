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

    /**
     * A chat has many chatable recipients
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function chatable()
    {
        return $this->morphTo();
    }

    /**
     * A chat has many group recipients
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->morphedByMany('Grpup', 'chatable');
    }

    /**
     * A chat has many user recipients
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function users()
    {
        return $this->morphedByMany('User', 'chatable');
    }

}