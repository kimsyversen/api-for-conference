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
			$randomDay = $faker->numberBetween(0,30);
			$randomHour = $faker->numberBetween(0,24);

			$startDate = Carbon::now()->addDays($randomDay)->addHours($randomHour)->minute(0)->second(0)->toDateTimeString();
            $endDate = Carbon::now()->addDays($randomDay)->addHours($randomHour)->addHours($faker->numberBetween(1,3))->minute(0)->second(0)->toDateTimeString();

			Session::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'title' => $faker->sentence(),
                'description' => $faker->text(),
                'location' => $faker->address,
                'start_time' => $startDate,
                'end_time' => $endDate,
			]);
		}
	}

}