<?php namespace commands\Generators\RoutesGenerator;

class RouteInput {

    public $name;

    public $group;

    public $controller;

    public $model;

    function __construct($name, $group, $controller, $model)
    {
        $this->name = $name;
        $this->group = $group;
        $this->controller = $controller;
        $this->model = $model;
    }
}