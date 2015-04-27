<?php namespace Uninett\Eloquent\Ratings\RequestCreateConferenceRatingCommand;

class RequestCreateConferenceRatingCommand {

    /**
     * @var string
     */
    public $conference_id;

    /**
     * @var string
     */
    public $user_id;

    /**
     * @param string conference_id
     * @param string user_id
     */
    public function __construct($conference_id, $user_id)
    {
        $this->conference_id = $conference_id;
        $this->user_id = $user_id;
    }

}