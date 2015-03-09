<?php namespace Uninett\Eloquent\Schedules\RequestActiveScheduleCommand;

class RequestActiveScheduleCommand {

    public $conference_id;

    function __construct($conference_id)
    {
        $this->conference_id = $conference_id;
    }

}