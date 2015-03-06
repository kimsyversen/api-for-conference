<?php namespace commands\Generators\RoutesGenerator;

class RouteInputParser {

    public function parse($route, $controller, $model)
    {
        $segments = explode('\\', str_replace('/', '\\', $route));
        $name = array_pop($segments);
        $group = $this->createGroupName($segments);

        return new RouteInput($name, $group, $controller, $model);
    }


    /**
     * @param $segments
     * @return string
     */
    public function createGroupName($segments)
    {
        $group = implode('.', $segments);

        $group = preg_replace('/{(.*)}/', '.$1', $group);

        return $group;
    }

}
