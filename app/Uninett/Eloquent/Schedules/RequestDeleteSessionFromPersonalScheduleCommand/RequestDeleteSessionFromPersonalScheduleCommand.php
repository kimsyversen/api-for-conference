<?php namespace Uninett\Eloquent\Schedules\RequestDeleteSessionFromPersonalScheduleCommand;

class RequestDeleteSessionFromPersonalScheduleCommand {

    /**
     * @var string
     */
    public $conference_id;

    /**
     * @var string
     */
    public $user_id;

    /**
     * @var string
     */
    public $session_id;

    /**
     * @param string conference_id
     * @param string user_id
     * @param string session_id
     */
    public function __construct($conference_id, $user_id, $session_id)
    {
        $this->conference_id = $conference_id;
        $this->user_id = $user_id;
        $this->session_id = $session_id;
    }

}