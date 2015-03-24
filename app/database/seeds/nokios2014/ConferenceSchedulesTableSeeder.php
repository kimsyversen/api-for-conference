<?php namespace database\seeds\nokios2014;

use Faker\Factory as Faker;

use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Sessions\Session;

class ConferenceSchedulesTableSeeder extends \UninettSeeder {

    private $faker;

	public function run()
	{
		$this->faker = Faker::create();

		//Create a schedule
		$conferenceSchedule = ConferenceSchedule::create([
			'conference_id' => 1
		]);

		//Add sessions to active schedule
		$sessions = Session::where('conference_id', '=', 1)->get();

		foreach ($sessions as $session)
			$conferenceSchedule->sessions()->save($session);
	}

 /*   private function addSessionsToSchedule(ConferenceSchedule $conferenceSchedule)
    {
        $sessions = Session::where('conference_id', '=', $conferenceSchedule['conference_id'])->get();

	    foreach($sessions as $session)
		    $conferenceSchedule->sessions()->save($session);
    }*/
}