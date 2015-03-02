<?php

use Faker\Factory as Faker;
use Uninett\Eloquent\Messages\Message;
use Uninett\Eloquent\Users\User;
use Uninett\Eloquent\Chats\Chat;

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $chat_ids = Chat::lists('id');

        $user_ids = User::lists('id');

		foreach(range(1, 200) as $index)
		{
			Message::create([
                'chat_id' => $faker->randomElement($chat_ids),
                'user_id' => $faker->randomElement($user_ids),
                'text' => $faker->text()
			]);
		}
	}

}