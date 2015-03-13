<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Sessions\Session;

class SessionsTableSeeder extends UninettSeeder {

/*	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach(range(1, 50) as $index)
		{
			$randomDay = $faker->numberBetween(0,30);
			$randomHour = $faker->numberBetween(0,24);

			$startDate = Carbon::now()->addDays($randomDay)->addHours($randomHour)->minute(0)->second(0)->toDateTimeString();
            $endDate = Carbon::now()->addDays($randomDay)->addHours($randomHour)->addHours($faker->numberBetween(1,3))->minute(0)->second(0)->toDateTimeString();

			Session::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'title' => $faker->sentence(),
                'description' => $faker->paragraph() . ' ' . $faker->paragraph() . ' ' . $faker->paragraph() . ' ' . $faker->paragraph(),
                'location' => $faker->address,
                'start_time' => $startDate,
                'end_time' => $endDate,
			]);
		}
	}*/

	public function run()
	{
		$conference_ids = Conference::lists('id');

		//Finne diff på timer for en konferanse?
		$conference_duration_hours = 8;

		$numberOfConferences = count($conference_ids);

		foreach(range(1, $numberOfConferences) as $index)
		{
			$conference = Conference::find(array_shift($conference_ids));

			//Each conference has multiple sessions
			//Each hour it is either parallell or serial sessions
			foreach(range(1, $conference_duration_hours) as $hour)
				if($hour % 5 == 0)
					$this->createParallellSessions($conference, $hour);
				else
					$this->createNewSession($conference, $hour);
		}
	}

	private function createParallellSessions($conference, $hours, $sessions = 5)
	{
		foreach(range(1, $sessions) as $sessionIndex)
			$this->createNewSession($conference, $hours);
	}

	private function createNewSession($conference, $hours)
	{
		$faker = Faker::create();

		$session_duration = $faker->numberBetween(1,3);

		Session::create([
			'conference_id' => $conference->id,
			'title' => $faker->sentence(),
			'description' => $faker->paragraph() . ' ' . $faker->paragraph() . ' ' . $faker->paragraph() . ' ' . $faker->paragraph(),
			'location' => $faker->address,
			'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', $conference->start_date)->addHours($hours + $session_duration)->second(1),
			'end_time' => Carbon::createFromFormat('Y-m-d H:i:s', $conference->start_date)->addHours(1 + $hours + $session_duration),
		]);
	}

}