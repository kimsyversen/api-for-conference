<?php
$factory('Uninett\Eloquent\Users\User', [
	'username' =>  $faker->userName,
	'email' => $faker->safeEmail,
	'password' => 'password',
	'confirmation_code' => str_random(40),
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);


$factory('Uninett\Eloquent\Users\User', [
	'username' =>  'foo',
	'email' => 'foo@example.com',
	'password' => 'foo',
	'confirmed' => 1,
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);

