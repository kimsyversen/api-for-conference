<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;


class ConferencesTableSeeder extends Seeder {

    private $faker;

	public function run()
	{
		$this->faker = Faker::create();

        $user_ids = User::lists('id');

		foreach(range(1, 10) as $index)
		{
			$conference = Conference::create([
                'name' => $this->faker->word,
                'banner' => $this->faker->url
			]);
		}
	}

}