<?php namespace Uninett\Eloquent\Groups;

class CreateGroupCommand {

    public $conference_id;

    public $name;

    function __construct($conference_id, $name)
    {
        $this->conference_id = $conference_id;
        $this->name = $name;
    }


}