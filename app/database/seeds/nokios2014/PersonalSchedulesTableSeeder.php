<?php namespace database\seeds\nokios2014;
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\PersonalSchedule;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Eloquent\Users\User;

class PersonalSchedulesTableSeeder extends \UninettSeeder {

    private $faker;

    public function run()
    {
        $this->faker = Faker::create();
/*
        $conference_ids = Conference::lists('id');

        $user_ids = User::lists('id');

        foreach(range(1, 40) as $index)
        {

            $personalSchedule = PersonalSchedule::create([
                'conference_id' => $this->faker->randomElement($conference_ids),
                'user_id' => $this->faker->randomElement($user_ids)
            ]);

            $this->addSessionsToSchedule($personalSchedule);
        }*/
    }

    private function addSessionsToSchedule(PersonalSchedule $personalSchedule)
    {
        $sessions = Session::where('conference_id', '=', $personalSchedule['conference_id'])->get();

        $numberOfSessions = $this->faker->numberBetween(0, $sessions->count());

        if( ! $session_ids = $this->getRandomCollectionIds($sessions, $numberOfSessions))
            return;

        foreach (range(1, $numberOfSessions) as $index)
            $personalSchedule->sessions()->save($sessions[array_shift($session_ids)]);
    }

}