<?php namespace Uninett\Eloquent\Schedules\RequestActiveScheduleCommand;

class RequestActiveScheduleCommand {

    public $conference_id;

    public $user_id;

    function __construct($conference_id, $user_id = null)
    {
        $this->conference_id = $conference_id;

        $this->user_id = $user_id;
    }

}