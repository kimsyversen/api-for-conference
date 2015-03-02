<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Newsfeeds\Newsfeed;

class NewsfeedsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach(range(1, 20) as $index)
		{
			Newsfeed::create([
                'conference_id' => $faker->randomElement($conference_ids)
			]);
		}
	}

}