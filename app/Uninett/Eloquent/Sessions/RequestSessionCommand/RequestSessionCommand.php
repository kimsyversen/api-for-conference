<?php namespace Uninett\Eloquent\Sessions\RequestSessionCommand;

class RequestSessionCommand {

    /**
     * @var string
     */
    public $conference_id;

    /**
     * @var string
     */
    public $session_id;

    /**
     * @var string
     */
    public $user_id;


    /**
     * @param $conference_id
     * @param $session_id
     * @param $user_id
     */
    public function __construct($conference_id, $session_id, $user_id = null)
    {
        $this->conference_id = $conference_id;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
    }

}