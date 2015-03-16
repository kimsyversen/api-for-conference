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

		$duration = 2;

		foreach(range(1, 10) as $index)
		{
			Conference::create([
                'name' => ucfirst($this->faker->sentence()),
                'description' => $this->faker->paragraph() . ' ' . $this->faker->paragraph() . ' ' . $this->faker->paragraph() . ' ' . $this->faker->paragraph(),
                'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png',
				'country' => $this->faker->country,
				'city' => $this->faker->city,
				'start_date' => Carbon::now()->addDays($index)->hour(8)->minute(0)->second(0),
                'end_date' => Carbon::now()->addDays($index + $duration)->hour(22)->minute(0)->second(0),
			]);
		}
	}

}