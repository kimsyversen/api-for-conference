<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;


class ConferencesTableSeeder extends Seeder {

    private $faker;

	public function run()
	{
		$this->faker = Faker::create();

        //$user_ids = User::lists('id');

		foreach(range(1, 10) as $index)
		{
			$conference = Conference::create([
                'name' => $this->faker->word,
                'description' => $this->faker->paragraph() . ' ' . $this->faker->paragraph() . ' ' . $this->faker->paragraph() . ' ' . $this->faker->paragraph(),
                'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now(),
			]);
		}
	}

}