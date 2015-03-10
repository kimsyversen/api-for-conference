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
     * @param string conference_id
     * @param string session_id
     */
    public function __construct($conference_id, $session_id)
    {
        $this->conference_id = $conference_id;
        $this->session_id = $session_id;
    }

}