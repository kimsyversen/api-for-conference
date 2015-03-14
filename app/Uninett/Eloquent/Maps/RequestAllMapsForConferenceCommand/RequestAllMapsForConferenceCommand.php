<?php namespace Uninett\Eloquent\Maps\RequestAllMapsForConferenceCommand;

class RequestAllMapsForConferenceCommand {

    /**
     * @var string
     */
    public $conference_id;

    /**
     * @param string conference_id
     */
    public function __construct($conference_id)
    {
        $this->conference_id = $conference_id;
    }

}