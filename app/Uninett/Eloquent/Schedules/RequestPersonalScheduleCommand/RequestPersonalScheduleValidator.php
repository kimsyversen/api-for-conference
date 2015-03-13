<?php namespace Uninett\Eloquent\Schedules\RequestPersonalScheduleCommand;

use Uninett\Validators\FormValidator;

class RequestPersonalScheduleValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'user_id' => 'required'
    ];

}