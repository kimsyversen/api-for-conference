<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Newsfeeds\Newsfeed;
use Uninett\Eloquent\Newsposts\Newspost;
use Uninett\Eloquent\Users\User;

class NewspostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $user_ids = User::lists('id');

        $newsfeed_ids = Newsfeed::lists('id');

		foreach(range(1, 200) as $index)
		{
			Newspost::create([
                'newsfeed_id' => $faker->randomElement($newsfeed_ids),
                'user_id' => $faker->randomElement($user_ids),
                'title' => $faker->word,
                'body' => $faker->text()
			]);
		}
	}

}