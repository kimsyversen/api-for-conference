<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Sessions\Session;

class ConferenceSchedulesTableSeeder extends UninettSeeder {

    private $faker;

	public function run()
	{
		$this->faker = Faker::create();

        $conference_ids = Conference::lists('id');

        $conferences = Conference::all();

        $this->createActiveSchedulesToConferences($conferences);

		foreach(range(1, 40) as $index)
		{
			$conferenceSchedule = ConferenceSchedule::create([
                'conference_id' => $this->faker->randomElement($conference_ids)
			]);

            $this->addSessionsToSchedule($conferenceSchedule);
        }
	}

    private function createActiveSchedulesToConferences($conferences)
    {
        foreach ($conferences as $conference)
        {
            $conferenceSchedule = ConferenceSchedule::create([
                'conference_id' => $conference['id']
            ]);

            $conference['active_schedule_id'] = $conferenceSchedule['id'];

            $conference->save();

            $this->addSessionsToSchedule($conferenceSchedule);
        }
    }

    private function addSessionsToSchedule(ConferenceSchedule $conferenceSchedule)
    {
        $sessions = Session::where('conference_id', '=', $conferenceSchedule['conference_id'])->get();

        $numberOfSessions = $this->faker->numberBetween(0, $sessions->count());

        if( ! $session_ids = $this->getRandomCollectionIds($sessions, $numberOfSessions))
            return;

        foreach (range(1, $numberOfSessions) as $index)
            $conferenceSchedule->sessions()->save($sessions[array_shift($session_ids)]);
    }
}