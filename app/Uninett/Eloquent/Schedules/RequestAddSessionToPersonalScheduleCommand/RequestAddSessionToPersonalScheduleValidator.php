<?php namespace Uninett\Eloquent\Schedules\RequestAddSessionToPersonalScheduleCommand;

use Uninett\Validators\FormValidator;

class RequestAddSessionToPersonalScheduleValidator extends FormValidator{

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'conference_id' => 'required',
        'user_id' => 'required',
        'session_id' => 'required',
    ];

}