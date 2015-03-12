<?php namespace Uninett\Eloquent\Questions\RequestCreateQuestionCommand;

class RequestCreateQuestionCommand {

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
     * @param string conference_id
     * @param string session_id
     * @param string user_id
     */
    public function __construct($conference_id, $session_id, $user_id)
    {
        $this->conference_id = $conference_id;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
    }

}