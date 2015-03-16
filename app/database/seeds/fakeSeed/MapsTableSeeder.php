<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Maps\Map;

class MapsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach(range(1, 50) as $index)
		{
			Map::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'uri' => 'http://www.nokios.no/_media/nokios-konferansekart.jpg',
                'description' => $faker->text()
			]);
		}
	}

}