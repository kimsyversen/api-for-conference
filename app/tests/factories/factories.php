<?php

use Carbon\Carbon;

/**
 * Conferences
 */
$factory('Uninett\Eloquent\Conferences\Conference', [
    'name' => $faker->sentence,
    'description' => $faker->paragraph,
    'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png',
    'start_date' => Carbon::now(),
    'end_date' => Carbon::now()->addDays(3),
    'country' => $faker->country,
    'city' => $faker->city,
]);


/**
 * Users
 */
$factory('Uninett\Eloquent\Users\User', [
    'email' => $faker->safeEmail,
    'password' => 'secret',
    'title' => $faker->word,
    'about' => $faker->paragraph,
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'country' => $faker->country,
    'company' => $faker->company,
    'position' => $faker->sentence,
    'confirmed' => 1,
    'confirmation_code' => str_random(40),
]);
$factory('Uninett\Eloquent\Users\User', 'my_user', [
    'email' => 'me@example.com',
    'password' => 'secret',
    'title' => 'Myself',
    'about' => 'I am just myself',
    'first_name' => 'Ola',
    'last_name' => 'Nordmann',
    'country' => 'Norway',
    'company' => 'Me inc.',
    'position' => 'Me',
    'confirmed' => 1,
    'confirmation_code' => str_random(40),
]);



//
//$factory('Uninett\Eloquent\Statistics\Statistic', [
//    'hits' =>  1,
//    'statistic_uri_id' => 'Factory:Uninett\Eloquent\StatisticUris\StatisticUri',
//    'created_at' => $faker->date(),
//    'updated_at' => $faker->date()
//]);
//
//$factory('Uninett\Eloquent\StatisticUris\StatisticUri', [
//    'name' =>  $faker->url,
//    'created_at' => $faker->date(),
//]);
//
///**
// * Conferences
// */
//$factory('Uninett\Eloquent\Conferences\Conference', [
//    'name' => $faker->sentence,
//    'description' => $faker->paragraph,
//    'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png',
//    'start_date' => Carbon::now(),
//    'end_date' => Carbon::now()->addDays(3),
//    'country' => $faker->country,
//    'city' => $faker->city,
//]);
//
//
//$factory('Uninett\Eloquent\Conferences\Conference', 'default_conference',[
//    'id' => 1,
//    'name' => $faker->word,
//    'description' => $faker->sentence(),
//    'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png',
//    'start_date' => $faker->date(),
//    'end_date' => $faker->date()
//]);
//
///**
// * ConferenceSchedules
// */
//$factory('Uninett\Eloquent\Schedules\ConferenceSchedule', [
//    'conference_id' => 'factory:Uninett\Eloquent\Conferences\Conference'
//]);
//$factory('Uninett\Eloquent\Schedules\ConferenceSchedule', 'default_conference_schedule', [
//    'id' => 1,
//    'conference_id' => 'factory:default_conference'
//]);
//
///**
// * Sessions
// */
//$factory('Uninett\Eloquent\Sessions\Session', [
//    'conference_id' => 'factory:Uninett\Eloquent\Conferences\Conference',
//    'title' => $faker->sentence(),
//    'description' => $faker->text(),
//    'location' => $faker->address,
//    'start_time' => Carbon::now(),
//    'end_time' => Carbon::now(),
//]);
//
//
