<?php namespace database\seeds\nokios2014;

use Faker\Factory as Faker;
use Uninett\Eloquent\Chats\Chat;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Groups\Group;
use Uninett\Eloquent\Users\User;

class ChatsTableSeeder extends \Seeder {

	public function run()
	{
		$faker = Faker::create();

        $conference_ids = Conference::lists('id');

		$users = User::all();

		foreach($conference_ids as $conference_id)
		{
			$groups = Group::where('conference_id', '=', $conference_id)->get();

			foreach($users as $user)
			{
				$chat = Chat::create([
					'conference_id' => $conference_id,
					'name' => ucfirst($faker->word)
				]);

				foreach($groups as $group)
					$chat->groups()->save($group);


				$chat->users()->save($user);
			}
		}
	}

}