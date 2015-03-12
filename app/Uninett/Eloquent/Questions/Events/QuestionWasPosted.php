<?php namespace Uninett\Eloquent\Ratings\Events;


class QuestionWasPosted {

    public $question;

    function __construct($question)
    {
        $this->question = $question;
    }


}