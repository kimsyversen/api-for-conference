<?php namespace database\seeds\laeringsfestivalen;

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Newsfeeds\Newsfeed;
use Uninett\Eloquent\Newsposts\Newspost;
use Uninett\Eloquent\Users\User;

class NewspostsTableSeeder extends  \Seeder {

	public function run()
	{
		Newspost::create([
            'newsfeed_id' => 1,
            'user_id' => 1,
            'title' => 'Test message',
            'body' => 'Testus testus 123'
		]);
	}
}