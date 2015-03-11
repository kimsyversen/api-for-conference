<?php namespace Uninett\Eloquent\Ratings\RequestCreateRatingCommand;

use Uninett\Validators\FormValidator;

class RequestCreateRatingValidator extends FormValidator{

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