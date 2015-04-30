<?php
use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Users\User;

class UserTableSeeder extends Seeder {


	public function run()
	{
		$faker = Faker::create();

		//The main test user and admin for the conferences
		User::create([
			'email' => 'admin@example.com',
			'password' => 'secret',
			'confirmed' => 1,
			'confirmation_code' => null,
			'remember_token' => null,

		]);

        //The co-admin for the conferences
        User::create([
            'email' => 'co-admin@example.com',
            'password' => 'secret',
            'confirmed' => 1,
            'confirmation_code' => null,
            'remember_token' => null,

        ]);

        //A normal participant for the conference
        User::create([
            'email' => 'participant@example.com',
            'password' => 'secret',
            'confirmed' => 1,
            'confirmation_code' => null,
            'remember_token' => null,

        ]);

		foreach(range(1, 10) as $index)
		{
			User::create([
				'email' => 'asdf'.  $index . $faker->safeEmail ,
				'password' => 'secret',
				'confirmed' => 1,
				'confirmation_code' => null,
				'remember_token' => null,

			]);
		}

	}
}