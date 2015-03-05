<?php
$factory('Uninett\Eloquent\Users\User', [
	'email' => $faker->safeEmail,
	'password' => 'password',
	'confirmation_code' => str_random(40),
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);


$factory('Uninett\Eloquent\Users\User', [
	'email' => 'foo@example.com',
	'password' => 'foo',
	'confirmed' => 1,
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);

$factory('Uninett\Eloquent\Statistics\Statistic', [
	'hits' =>  1,
	'statistic_uri_id' => 'Factory:Uninett\Eloquent\StatisticUris\StatisticUri',
	'created_at' => $faker->date(),
	'updated_at' => $faker->date()
]);

$factory('Uninett\Eloquent\StatisticUris\StatisticUri', [
	'name' =>  $faker->url,
	'created_at' => $faker->date(),
]);


