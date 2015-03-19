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

        $conference_ids = Conference::lists('id');

        $users = User::all();

		foreach(range(1, count($conference_ids) * 3) as $index)
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

		}
	}

}