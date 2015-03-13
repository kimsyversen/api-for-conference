<?php namespace Uninett\Eloquent\Schedules\RequestPersonalScheduleCommand;

class RequestPersonalScheduleCommand {

    public $conference_id;

    public $user_id;

    function __construct($conference_id, $user_id)
    {
        $this->conference_id = $conference_id;
        $this->user_id = $user_id;
    }


}