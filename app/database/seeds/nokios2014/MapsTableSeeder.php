<?php namespace database\seeds\nokios2014;

use Uninett\Eloquent\Maps\Map;

class MapsTableSeeder extends \Seeder {

	public function run()
	{
        Map::create([
            'conference_id' => 1,
            'uri' => 'http://www.nokios.no/_media/nokios-konferansekart.jpg',
            'description' => 'Her er et kart over konferansen for å hjelpe deg å finne frem.'
        ]);
	}
}