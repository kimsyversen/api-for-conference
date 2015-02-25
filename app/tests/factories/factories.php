<?php
$factory('Larabook\Users\User', [
	'username' =>  $faker->userName,
	'email' => $faker->safeEmail,
	'password' => 'password',
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);


$factory('Larabook\Users\User', [
	'username' =>  'foo',
	'email' => 'foo@example.com',
	'password' => 'foo',
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);

$factory('Larabook\Statuses\Status', [
	'body' =>  $faker->text(),
	'user_id' => 'factory:Larabook\Users\User',
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);