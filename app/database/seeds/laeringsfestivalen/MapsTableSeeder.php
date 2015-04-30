<?php namespace database\seeds\laeringsfestivalen;

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Maps\Map;

class MapsTableSeeder extends  \Seeder {

	public function run()
	{
        $conference_id = 1;

		Map::create([
			'conference_id' => $conference_id,
			'uri' => 'img/LF15_Rom.png',
			'description' => ''
		]);

		Map::create([
			'conference_id' => $conference_id,
			'uri' => 'img/LF15_TO.png',
			'description' => 'Map data ©2015 Google'
		]);
	}
}