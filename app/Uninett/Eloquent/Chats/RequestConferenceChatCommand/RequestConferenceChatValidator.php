<?php namespace Uninett\Eloquent\Chats\RequestConferenceChatCommand;

use Uninett\Validators\FormValidator;

class RequestConferenceChatValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'chat_id' => 'required',
        'user_id' => 'required',
    ];

}