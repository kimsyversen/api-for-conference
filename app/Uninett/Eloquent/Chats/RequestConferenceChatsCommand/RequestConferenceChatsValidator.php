<?php namespace Uninett\Eloquent\Chats\RequestConferenceChatsCommand;

use Uninett\Validators\FormValidator;

class RequestConferenceChatsValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'user_id' => 'required',
    ];

}