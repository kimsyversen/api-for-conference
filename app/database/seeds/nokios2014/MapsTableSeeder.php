<?php namespace database\seeds\nokios2014;
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Maps\Map;

class MapsTableSeeder extends \Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach($conference_ids as $conference_id)
		{
			Map::create([
				'conference_id' => $conference_id,
				'uri' => 'http://www.nokios.no/_media/nokios-konferansekart.jpg',
				'description' => $faker->text()
			]);
		}
	}
}