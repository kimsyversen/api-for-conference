<?php namespace Uninett\Eloquent\Ratings\RequestStoreRatingCommand;

use Uninett\Validators\FormValidator;

class RequestStoreRatingValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'session_id' => 'required',
        'user_id' => 'required',
        'score' => 'required',
        'comment' => 'required',
    ];

}