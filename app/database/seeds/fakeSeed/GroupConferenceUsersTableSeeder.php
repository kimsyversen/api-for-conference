<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;


class GroupConferenceUsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $user_ids = User::lists('id');

        $user_id = $faker->unique()->randomElement($user_ids);

        foreach(Conference::all() as $conference)
        {
            foreach($conference->groups as $conferenceGroup)
            {
                DB::insert('insert into group_conference_user (conference_id, group_id, user_id, created_at, updated_at) values (?, ?, ?, ?, ?)',
                    [$conferenceGroup['conference_id'],$conferenceGroup['id'],$user_id, Carbon::now(), Carbon::now()]);
            }

            $user_id = $faker->unique($reset = true)->randomElement($user_ids);
        }
    }
}