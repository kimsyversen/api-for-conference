<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Questions\Question;

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $user_ids = \Uninett\Eloquent\Users\User::lists('id');

        $session_ids = Uninett\Eloquent\Sessions\Session::lists('id');

		foreach(range(1, 50) as $index)
		{
			Question::create([
                'session_id' => $faker->randomElement($session_ids),
                'user_id' => $faker->randomElement($user_ids),
                'text' => $faker->text()
			]);
		}
	}

}