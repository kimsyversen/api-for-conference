<?php namespace database\seeds\laeringsfestivalen;
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Newsfeeds\Newsfeed;

class NewsfeedsTableSeeder extends  \Seeder {

	public function run()
	{
        $conference_ids = Conference::lists('id');

		foreach($conference_ids as $id)
			Newsfeed::create([
				'conference_id' => $id,
				'user_twitter' => 'laeringsfestivalen2015',
			]);
	}
}