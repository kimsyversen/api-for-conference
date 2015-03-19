<?php

use Faker\Factory as Faker;
use Uninett\Eloquent\Chats\Chat;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Groups\Group;
use Uninett\Eloquent\Users\User;

class ChatsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		foreach(range(1, 10) as $index)
		{
			$chat = Chat::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'name' => $faker->word
			]);

            //Add groups
            $groups = Group::where('conference_id', '=', $chat['conference_id'])->get();
            if( ! $groups->isEmpty() )
                foreach(range(0, count($groups)-1) as $groupIndex)
                    $chat->groups()->save($groups[$groupIndex]);

            //Add individual users
            $users = User::all();
            if( ! $users->isEmpty() )
                foreach(range(0, count($users)-1) as $userIndex)
                    $chat->users()->save($users[$userIndex]);
		}
	}

}