<?php namespace Uninett\Eloquent\Ratings\Events;


class ConferenceWasRated {

    public $rating;

    function __construct($rating)
    {
        $this->rating = $rating;
    }


}