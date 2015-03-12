<?php namespace Uninett\Eloquent\Ratings\RequestCreateSessionRatingCommand;

use Uninett\Validators\FormValidator;

class RequestCreateSessionRatingValidator extends FormValidator{

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