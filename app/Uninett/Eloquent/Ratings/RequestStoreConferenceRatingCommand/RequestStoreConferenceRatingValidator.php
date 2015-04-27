<?php namespace Uninett\Eloquent\Ratings\RequestStoreConferenceRatingCommand;

use Uninett\Validators\FormValidator;

class RequestStoreConferenceRatingValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'user_id' => 'required',
        'score' => 'required',
        'comment' => 'required',
    ];

}