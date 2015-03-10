<?php namespace Uninett\Eloquent\Sessions\Events;


class SessionWasRequested {

    public $session;

    function __construct($session)
    {
        $this->session = $session;
    }


}