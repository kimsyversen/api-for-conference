<?php namespace Uninett\Eloquent\Ratings\RequestStoreSessionRatingCommand;

class RequestStoreSessionRatingCommand {

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
     * @var string
     */
    public $score;

    /**
     * @var string
     */
    public $comment;

    /**
     * @param string conference_id
     * @param string session_id
     * @param string user_id
     * @param string score
     * @param string comment
     */
    public function __construct($conference_id, $session_id, $user_id, $score, $comment)
    {
        $this->conference_id = $conference_id;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->score = $score;
        $this->comment = $comment;
    }

}