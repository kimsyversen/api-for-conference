<?php namespace Uninett\Eloquent\Newsfeeds\RequestNewsfeedCommand;

use Uninett\Validators\FormValidator;

class RequestNewsfeedValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
    ];

}