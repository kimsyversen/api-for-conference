<?php namespace Uninett\Eloquent\Maps\RequestAllMapsForConferenceCommand;

use Uninett\Validators\FormValidator;

class RequestAllMapsForConferenceValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
    ];

}