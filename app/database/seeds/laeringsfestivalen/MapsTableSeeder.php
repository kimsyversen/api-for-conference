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
			'uri' => 'https://www.ntnu.no/documents/1241075345/1263588144/Elektro_1etg_laringsfestivalen.png/06facd6e-f076-40c7-bc3b-b36cc5cb30d7?t=1430138286876',
			'description' => ''
		]);
	}

}