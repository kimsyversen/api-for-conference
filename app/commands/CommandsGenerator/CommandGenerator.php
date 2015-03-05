<?php namespace commands\CommandsGenerator;

use Illuminate\Filesystem\Filesystem;
use Mustache_Engine;

class CommandGenerator {

    protected $file;

    protected $mustache;

    public function __construct(Filesystem $file, Mustache_Engine $mustache)
    {
        $this->file = $file;
        $this->mustache = $mustache;
    }

    public function make(CommandInput $input, $template, $destination)
    {
        $template = $this->file->get($template);

        $stub = $this->mustache->render($template, $input);

        $this->file->put($destination, $stub);
    }

    public function createFolder($path, $base)
    {
        $segments = explode('\\', str_replace('/', '\\', $path));

        $name = array_pop($segments);

        $newPath = "{$path}Command/{$name}";

        $this->file->makeDirectory("{$base}/{$path}Command");

        return $newPath;
    }

}
