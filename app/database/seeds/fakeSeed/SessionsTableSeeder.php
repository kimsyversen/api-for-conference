<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Sessions\Session;

class SessionsTableSeeder extends UninettSeeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach(range(1, 50) as $index)
		{
            $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('now', '+1 months')->getTimestamp());
            $startTime = $startDate->format('Y-m-d H:00:00');
            $endTime = $startDate->addHours($faker->numberBetween(1, 8))->format('Y-m-d H:00:00');

			Session::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'title' => $faker->sentence(),
                'description' => $faker->text(),
                'location' => $faker->address,
                'start_time' => $startTime,
                'end_time' => $endTime
			]);
		}
	}

}