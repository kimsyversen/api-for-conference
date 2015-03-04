<?php namespace commands\CommandsGenerator;

use \Illuminate\Console\Command;
use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Input\InputArgument;

class CommandStructureCreatorCommand extends Command {

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
     * Command structure generator
     *
     * @var CommandStructureGenerator
     */
    protected $generator;

    /**
     * Create a new command instance.
     *
     * @param CommandStructureGenerator $generator
     */
	public function __construct(CommandStructureGenerator $generator)
	{
		parent::__construct();

        $this->generator = $generator;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$commandName = $this->argument('commandName');

        $commandPath = $this->argument('commandPath');

        $commandFilesPath = $this->generator->make($commandName, $commandPath);

        $this->info('Command files generated in ' . $commandFilesPath);

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('commandName', InputArgument::REQUIRED, 'Command name'),
            array('commandPath', InputArgument::REQUIRED, 'Command path'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('properties', null, InputOption::VALUE_OPTIONAL, 'A comma-separated list of properties for the command.', null),
		);
	}

}
