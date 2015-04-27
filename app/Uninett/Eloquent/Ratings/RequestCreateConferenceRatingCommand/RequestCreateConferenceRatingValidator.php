<?php namespace Uninett\Eloquent\Ratings\RequestCreateConferenceRatingCommand;

use Uninett\Validators\FormValidator;

class RequestCreateConferenceRatingValidator extends FormValidator{

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