<?php namespace Uninett\Eloquent\Schedules\Events;


class SessionWasDeletedFromPersonalSchedule {

    public $personalSchedule;

    public $session;

    function __construct($personalSchedule, $session)
    {
        $this->personalSchedule = $personalSchedule;
        $this->session = $session;
    }


}