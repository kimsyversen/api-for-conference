<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ApiMigrationsMigrateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'api:migrate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Migrate tables for local or production environment';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
	/*	$environments = [];
		if ($this->option('e') != "")
			$environments = explode(',', $this->option('e'));

		foreach($environments as $environment)
		{
			$this->call('migrate', ['--path' => 'app/database/migrations', '--env' => $environment]);
			$this->call('migrate', ['--path' => 'app/database/migrations/domain', '--env' => $environment]);
		}*/

		$this->call('migrate', ['--path' => 'app/database/migrations', '--env' => $this->option('env')]);
		$this->call('migrate', ['--path' => 'app/database/migrations/domain', '--env' => $this->option('env')]);

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(

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
			array('path', null, InputOption::VALUE_OPTIONAL, 'Path to the migrations file, relative from app directory', null),
			array('e', null, InputOption::VALUE_REQUIRED, 'Environments commaseparated', null),
		);
	}

}
