<?php
use Faker\Factory as Faker;
use Uninett\Eloquent\Users\User;

class UserTableSeeder extends DatabaseSeeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			User::create([
				'username' => $faker->userName,
				'email' => $faker->safeEmail,
				'password' => 'secret',

			]);
		}
	}
}