<?php namespace database\seeds\laeringsfestivalen;

// Composer: "fzaninotto/faker": "v1.3.0"
use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Sessions\Session;

class ConferenceSchedulesTableSeeder extends \Seeder {
	public function run()
	{
		//Create a schedule
		$conferenceSchedule = ConferenceSchedule::create([
			'conference_id' => 1
		]);

		//Add sessions to active schedule
		$sessions = Session::where('conference_id', '=', 1)->get();

		foreach ($sessions as $session)
			$conferenceSchedule->sessions()->save($session);
	}
}