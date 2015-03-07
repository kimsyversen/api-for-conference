<?php

use Carbon\Carbon;

$factory('Uninett\Eloquent\Conferences\Conference', [
    'name' => $faker->word,
    'description' => $faker->sentence(),
    'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png'
]);

$factory('Uninett\Eloquent\Sessions\Session', [
    'conference_id' => 'factory:Uninett\Eloquent\Conferences\Conference',
    'title' => $faker->sentence(),
    'description' => $faker->text(),
    'location' => $faker->address,
    'start_time' => Carbon::now(),
    'end_time' => Carbon::now(),
]);

$factory('Uninett\Eloquent\Schedules\ConferenceSchedule', [
    'conference_id' => 'factory:Uninett\Eloquent\Conferences\Conference'
]);

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


