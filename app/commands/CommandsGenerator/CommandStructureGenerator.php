<?php namespace commands\CommandsGenerator;

use \Illuminate\Filesystem\Filesystem;

class CommandStructureGenerator {

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $file;

    /**
     * @var array
     */
    private $templates = [
        'command',
        'commandHandler',
        'validator'
    ];

    /**
     * @param Filesystem $filesystem
     */
    function __construct(Filesystem $filesystem)
    {
        $this->file = $filesystem;
    }

    /**
     * @param $name
     * @param $path
     * @param $properties
     * @return string
     */
    public function make($name, $path)
    {
        $name = ucwords($name);

        $commandFolderPath = $this->createCommandFolder($name, $path);

        foreach ($this->templates as $template)
        {
            $this->createFile($commandFolderPath, $name, $template, ['namespace' => $this->getNamespace($commandFolderPath)]);
        }

        return $commandFolderPath;
    }

    /**
     * @param $path
     * @return mixed
     */
    private function getNamespace($path)
    {
        $namespace = str_replace(app_path() . '/', '', $path);

        $namespace = str_replace('/', '\\', $namespace);

        return $namespace;
    }

    /**
     * @param $name
     * @param $path
     * @return string
     */
    private function createCommandFolder($name, $path)
    {
        $commandFolderPath = app_path() . '/' . $path . '/' . $name . 'Command';

        $this->file->makeDirectory($commandFolderPath);

        return $commandFolderPath;
    }

    /**
     * @param $template
     * @param array $parameters
     * @return mixed
     */
    private function getTemplate($template, array $parameters = [])
    {
        $template = $this->file->get(__DIR__.'/templates/'.$template.'.txt');

        $template = $this->fillTemplate($template, $parameters);

        return $template;
    }

    private function fillTemplate($template, array $parameters = [])
    {
        foreach ($parameters as $key => $parameter)
        {
            $template = str_replace('{{' . strtoupper($key) . '}}', $parameter, $template);
        }

        return $template;
    }

    /**
     * @param $filePath
     * @param $name
     * @param $template
     * @param array $parameters
     * @return mixed
     */
    private function createFile($filePath, $name, $template, array $parameters = [])
    {
        $parameters = array_merge($parameters, ['name' => $name]);

        $fileName = $filePath . '/' . $name . ucwords($template) . '.php';

        $template = $this->getTemplate($template, $parameters);

        return $this->file->put($fileName, $template);
    }
}