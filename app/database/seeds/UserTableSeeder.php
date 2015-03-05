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
            'title' => 'admin',
            'about' => 'The administrator for all the conferences.',
            'first_name' => 'Admin',
            'last_name' => 'Istrator',
            'country' => 'Norway',
            'company' => 'Boss inc.',
            'position' => 'President',
			'confirmed' => 1,
			'confirmation_code' => null,
			'remember_token' => null,

		]);

        //The co-admin for the conferences
        User::create([
            'email' => 'co-admin@example.com',
            'password' => 'secret',
            'title' => 'co-admin',
            'about' => 'The co-administrator for all the conferences.',
            'first_name' => 'Co Admin',
            'last_name' => 'Istrator',
            'country' => 'Norway',
            'company' => 'Boss inc.',
            'position' => 'Vise President',
            'confirmed' => 1,
            'confirmation_code' => null,
            'remember_token' => null,

        ]);

        //A normal participant for the conference
        User::create([
            'email' => 'participant@example.com',
            'password' => 'secret',
            'title' => 'participant',
            'about' => 'A participant for all the conferences.',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'country' => 'Norway',
            'company' => 'Guest inc.',
            'position' => 'President',
            'confirmed' => 1,
            'confirmation_code' => null,
            'remember_token' => null,

        ]);


		foreach(range(1, 10) as $index)
		{
			User::create([
				'email' => 'asdf'.  $index . $faker->safeEmail ,
				'password' => 'secret',
                'title' => $faker->word,
                'about' => $faker->sentence(),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'country' => $faker->country,
                'company' => $faker->company,
                'position' => $faker->word,
				'confirmed' => 1,
				'confirmation_code' => null,
				'remember_token' => null,

			]);
		}

	}
}