<?php namespace Uninett\Eloquent\Questions\RequestCreateQuestionCommand;

use Uninett\Validators\FormValidator;

class RequestCreateQuestionValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'session_id' => 'required',
        'user_id' => 'required',
    ];

}