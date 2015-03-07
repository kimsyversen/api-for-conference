<?php namespace commands\Generators\CommandsGenerator;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Filesystem\Filesystem;
use Mustache_Engine;

/**
 * This code is a modification of the commander package
 * authored by Jeffery Way. Source:
 * https://github.com/laracasts/Commander
 */
class CommanderGenerateCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new command structure';

    /**
     * @var CommandInputParser
     */
    protected $parser;

    /**
     * @var CommandGenerator
     */
    protected $generator;

    /**
     * Create a new command instance.
     *
     * @param CommandInputParser $parser
     * @param CommandGenerator $generator
     */
    public function __construct(CommandInputParser $parser, CommandGenerator $generator)
    {
        $this->parser = $parser;
        $this->generator = $generator;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $path = $this->argument('path');
        $properties = $this->option('properties');
        $base = $this->option('base');

        // Create a command folder to put the command files within...
        $path = $this->generator->createFolder($path, $base);

        // Parse the command input.
        $commandInput = $this->parser->parse($path.'Command', $properties);
        $handlerInput = $this->parser->parse($path.'CommandHandler', $properties);
        $validatorInput = $this->parser->parse($path.'Validator', $properties);


        // Actually create the files with the correct boilerplate.
        $this->generator->make(
            $commandInput,
            __DIR__.'/templates/command.stub',
            "{$base}/{$path}Command.php"
        );

        $this->generator->make(
            $handlerInput,
            __DIR__.'/templates/handler.stub',
            "{$base}/{$path}CommandHandler.php"
        );

        $this->generator->make(
            $validatorInput,
            __DIR__.'/templates/validator.stub',
            "{$base}/{$path}Validator.php"
        );

        $this->info('All done! Your classes have now been generated.');
    }

    protected function getArguments()
    {
        return [
            ['path', InputArgument::REQUIRED, 'The class path for the command to generate.']
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['properties', null, InputOption::VALUE_OPTIONAL, 'A comma-separated list of properties for the command.', null],
            ['base', null, InputOption::VALUE_OPTIONAL, 'The path to where your domain root is located.', 'app']
        ];
    }

}
