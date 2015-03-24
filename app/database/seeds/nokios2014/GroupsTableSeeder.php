<?php namespace database\seeds\nokios2014;
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Groups\Group;
use Uninett\Eloquent\Users\User;

class GroupsTableSeeder extends \Seeder {

	public function run()
	{
        $conference_ids = Conference::lists('id');

        $users = User::all();

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