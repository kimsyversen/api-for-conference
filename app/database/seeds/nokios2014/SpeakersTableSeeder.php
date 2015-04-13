<?php namespace database\seeds\nokios2014;

use Faker\Factory as Faker;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Eloquent\Speakers\Speaker;

class SpeakersTableSeeder extends \Seeder{
	private $faker;

	public function run()
	{
        $this->faker = Faker::create();

		$sessions = Session::lists('id');

		foreach($sessions as $session) {
			Speaker::create([
				'session_id' => $session,
				'first_name' => $this->faker->firstName,
				'last_name' => $this->faker->lastName,
				'affiliation' => 'ExampleCorp',
				'title' => 'Execute Director',
				'description' => $this->faker->paragraph(),
			]);

			if($this->faker->numberBetween(1,2) % 2 == 0)
				Speaker::create([
					'session_id' => $session,
					'first_name' => $this->faker->firstName,
					'last_name' => $this->faker->lastName,
					'affiliation' => 'ExampleCorp',
					'title' => 'Execute Director',
					'description' => $this->faker->paragraph(),
				]);

		}
	}
}