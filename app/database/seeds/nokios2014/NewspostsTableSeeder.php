<?php namespace database\seeds\nokios2014;

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Newsfeeds\Newsfeed;
use Uninett\Eloquent\Newsposts\Newspost;
use Uninett\Eloquent\Users\User;

class NewspostsTableSeeder extends \Seeder {

	public function run()
	{
		$faker = Faker::create();

        $user_ids = User::lists('id');

        $newsfeed_ids = Newsfeed::lists('id');

		foreach($newsfeed_ids as $newsfeed_id)
			foreach(range(1, 3) as $index)
				Newspost::create([
	                'newsfeed_id' => $newsfeed_id,
	                'user_id' => $faker->randomElement($user_ids),
	                'title' => $faker->sentence(),
	                'body' => $faker->text()
				]);

	}

}