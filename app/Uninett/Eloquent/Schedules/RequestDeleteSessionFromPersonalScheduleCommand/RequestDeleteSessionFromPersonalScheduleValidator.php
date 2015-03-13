<?php namespace Uninett\Eloquent\Schedules\RequestDeleteSessionFromPersonalScheduleCommand;

use Uninett\Validators\FormValidator;

class RequestDeleteSessionFromPersonalScheduleValidator extends FormValidator{

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