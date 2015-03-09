<?php namespace Uninett\Eloquent\Schedules\Events;


class ActiveScheduleWasRequested {

    public $schedule;

    function __construct($schedule)
    {
        $this->schedule = $schedule;
    }

}