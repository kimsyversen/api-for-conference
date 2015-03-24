<?php namespace database\seeds\nokios2014;

use Carbon\Carbon;
use DB;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;


class UserConferenceRolesTableSeeder extends \Seeder {

    public function run()
    {
        $faker = Faker::create();

        $user_ids = User::lists('id');

        $conference_ids = Conference::lists('id');



        foreach($conference_ids as $conference_id)
        {
            DB::insert('insert into conference_roles (role_id, conference_id, user_id, created_at, updated_at) values (?, ?, ?, ?, ?)',
                [1,$conference_id,1, Carbon::now(),Carbon::now()]);
            DB::insert('insert into conference_roles (role_id, conference_id, user_id, created_at, updated_at) values (?, ?, ?, ?, ?)',
                [2,$conference_id,2, Carbon::now(), Carbon::now()]);
            DB::insert('insert into conference_roles (role_id, conference_id, user_id, created_at, updated_at) values (?, ?, ?, ?, ?)',
                [3,$conference_id,3, Carbon::now(), Carbon::now()]);

            foreach(range(4, count($user_ids)) as $user_id)
                DB::insert('insert into conference_roles (role_id, conference_id, user_id, created_at, updated_at) values (?, ?, ?, ?, ?)',
                    [3,$conference_id,$user_id, Carbon::now(), Carbon::now()]);
        }
    }

}