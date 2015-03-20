<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Groups\Group;
use Uninett\Eloquent\Users\User;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$admin = User::where('email', 'admin@example.com')->get();

		$coAdmin = User::where('email', 'co-admin@example.com')->get();

        $conference_ids = Conference::lists('id');

        $users = User::all();

/*		foreach(range(1, count($conference_ids) * 3) as $index)
		{
			$group = Group::create([
                'conference_id' => $faker->randomElement($conference_ids),
                'name' => $faker->word
			]);

            $userPool = $users->random($users->count() / 2);

            foreach ($userPool as $user)
            {
                $group->users()->save($user);
            }

		}*/

		foreach($conference_ids as $cid)
		{
			$group = $this->createGroup('Admin', $cid);



			$admins = User::where('email', 'admin@example.com')->where('email', 'co-admin@example.com')->get();

			$this->attachUsersToGroup($group, $admins);

			$group = $this->createGroup('Participants', $cid);

			$this->attachUsersToGroup($group, $users);

		}
	}

	private function createGroup($groupName, $conferenceId)
	{
		return Group::create([
			'conference_id' => $conferenceId,
			'name' => $groupName,
		]);
	}

	private function attachUsersToGroup(Group $group, $users)
	{
		foreach($users as $user)
			$group->users()->save($user);
	}

}