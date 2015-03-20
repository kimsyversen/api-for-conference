<?php namespace Uninett\Eloquent\Messages;

use Carbon\Carbon;
use Eloquent;

class Message extends Eloquent {
    
    /**
     * Fillable fields for a new Message
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Get the created at attribute as a carbon instance
     *
     * @param $value
     * @return Carbon
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    /**
     * Get the updated at attribute as a carbon instance
     *
     * @param $value
     * @return Carbon
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    /**
     * A message belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Uninett\Eloquent\Users\User');
    }

    /**
     * A message belongs to a chat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chat()
    {
        return $this->belongsTo('Uninett\Eloquent\Chats\Chat');
    }

}