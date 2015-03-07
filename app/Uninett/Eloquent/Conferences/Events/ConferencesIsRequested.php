<?php namespace Uninett\Eloquent\Conferences\Events;


class ConferencesIsRequested {

    public $paginatedConferences;

    function __construct($paginatedConferences)
    {
        $this->paginatedConferences = $paginatedConferences;
    }

}