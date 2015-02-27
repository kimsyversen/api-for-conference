<?php namespace Uninett\Api\Requests;

use Carbon\Carbon;
use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Statistics\Statistic;
use Uninett\Eloquent\Statistics\StatisticRepository;
use Uninett\Eloquent\StatisticUris\StatisticUriRepository;


class LogRequestCommandHandler implements CommandHandler {

	private $statisticRepository;
	private $statisticUriRepository;

	function __construct(StatisticRepository $statisticRepository, StatisticUriRepository $statisticUriRepository)
	{
		$this->statisticRepository = $statisticRepository;
		$this->statisticUriRepository = $statisticUriRepository;
	}


	/**
	 * Handle the command.
	 *
	 * @param object $command
	 * @return void
	 */
	public function handle($command)
	{
		//TODO: Flytte til respository?

		$record = $this->statisticUriRepository->find($command->request);

		if(isset($record)) {

			//If you want to test
			//date_default_timezone_set('America/Curacao');

			$foundRecord = $this->statisticRepository->whereCreatedAtBetween(
				Carbon::now()->format('Y-m-d H:00:00')
				, Carbon::now()->addHour()->format('Y-m-d H:00:00'));

			if(isset($foundRecord))
				$this->statisticRepository->increment('hits');
				//$statistics->increment('hits');
			else
				$this->statisticRepository->create([
					'hits' => 1,
					'statistic_uri_id' => $record->id
				]);
		} else {

			$newUri = $this->statisticUriRepository->create([
				'name' => $command->request
			]);

			$this->statisticRepository->create([
				'hits' => 1,
				'statistic_uri_id' => $newUri->id
			]);
		}
	}

}