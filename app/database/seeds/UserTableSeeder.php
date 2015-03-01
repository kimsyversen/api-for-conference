<?php
use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Users\User;

class UserTableSeeder extends Seeder {


	public function run()
	{
		$faker = Faker::create();

		//The main test user
		User::create([
			'username' => 'user',
			'email' => 'user@example.com',
			'password' => 'secret',
			'confirmed' => 1,
			'confirmation_code' => null,
			'remember_token' => null,

		]);


		foreach(range(1, 10) as $index)
		{
			User::create([
				'username' => $faker->userName . $index,
				'email' => 'asdf'.  $index . $faker->safeEmail ,
				'password' => 'secret',
				'confirmed' => 1,
				'confirmation_code' => null,
				'remember_token' => null,

			]);
		}

	}
}