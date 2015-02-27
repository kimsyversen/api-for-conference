<?php namespace Uninett\Api\Requests;

use Carbon\Carbon;
use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Statistics\Statistic;
use Uninett\Eloquent\StatisticUris\StatisticUri;


class LogRequestCommandHandler implements CommandHandler {

	/**
	 * Handle the command.
	 *
	 * @param object $command
	 * @return void
	 */
	public function handle($command)
	{
		//TODO: Flytte til respository?

		$record = StatisticUri::where('name', '=', $command->request)->first();

		if(isset($record)) {
			//date_default_timezone_set('America/Curacao');

			$statistics = Statistic::whereBetween (
				'created_at', [
				Carbon::now()->format('Y-m-d H:00:00'),
				Carbon::now()->addHour()->format('Y-m-d H:00:00')
			])->first();

			if(isset($statistics))
				$statistics->increment('hits');
			else
				Statistic::create([
					'hits' => 1,
					'statistic_uri_id' => $record->id
				]);
		} else {

			$newUri = StatisticUri::create([
				'name' => $command->request
			]);

			Statistic::create([
				'hits' => 1,
				'statistic_uri_id' => $newUri->id
			]);
		}
	}

}