<?php namespace Uninett\Eloquent\Questions\RequestStoreQuestionCommand;

use Uninett\Validators\FormValidator;

class RequestStoreQuestionValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'session_id' => 'required',
        'user_id' => 'required',
        'question' => 'required',
    ];

}