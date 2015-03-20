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

		$now = Carbon\Carbon::now();
		foreach($chat_ids as $chat_id)
		{
			foreach(range(1, 5) as $index)
			{
				Message::create([
					'chat_id' => $chat_id,
					'user_id' => $faker->randomElement($user_ids),
					'text' => ucfirst($faker->paragraph()),
					'created_at' => $now->addMinutes($index),
					'updated_at' => $now->addMinutes($index)
				]);
			}
		}
	}

}