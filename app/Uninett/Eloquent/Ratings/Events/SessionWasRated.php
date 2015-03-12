<?php namespace Uninett\Eloquent\Ratings\Events;


class SessionWasRated {

    public $rating;

    function __construct($rating)
    {
        $this->rating = $rating;
    }


}