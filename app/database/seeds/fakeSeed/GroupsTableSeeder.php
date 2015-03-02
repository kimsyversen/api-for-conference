<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Groups\Group;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach(range(1, count($conference_ids) * 2) as $index)
		{
			Group::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'name' => $faker->word
			]);
		}
	}

}