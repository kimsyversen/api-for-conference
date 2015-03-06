<?php namespace commands\Generators\RoutesGenerator;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RoutesGeneratorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:route';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate routes file.';

    /**
     * @var CommandInputParser
     */
    protected $parser;

    /**
     * @var CommandGenerator
     */
    protected $generator;


    /**
     * @param RouteInputParser $parser
     * @param RoutesGenerator $generator
     */
    public function __construct(RouteInputParser $parser, RoutesGenerator $generator)
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
        // Template variabel: name, model, group, controller

        // php artisan generate:route api/v1/conferences ConferencesController --model="Uninett/Eloquent/Conferences/Conference"
        $route = $this->argument('route');
        $controller = $this->argument('controller');
        $model = $this->option('model');
        $base = $this->option('base');

        // Parse the command input.
        $routeInput = $this->parser->parse($route, $controller, $model);

        // Actually create the files with the correct boilerplate.
        $this->generator->make(
            $routeInput,
            __DIR__.'/templates/routes.stub',
            "{$base}/{$route}.php"
        );

        $this->info('All done! Your classes have now been generated.');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('route', InputArgument::REQUIRED, 'The route.'),
            array('controller', InputArgument::REQUIRED, 'The controller of this route.'),
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
			array('model', null, InputOption::VALUE_OPTIONAL, 'The eloquent model', null),
            array('base', null, InputOption::VALUE_OPTIONAL, 'The eloquent model', 'app/routes'),
		);
	}

}
