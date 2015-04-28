<?php namespace database\seeds\laeringsfestivalen;

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Maps\Map;

class MapsTableSeeder extends  \Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_id = 1;

		Map::create([
			'conference_id' => $conference_id,
			'uri' => 'http://www.nokios.no/_media/nokios-konferansekart.jpg',
			'description' => $faker->text()
		]);
	}

}