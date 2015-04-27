<?php namespace Uninett\Eloquent\Schedules\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use Uninett\Api\Transformers\SessionGroupTrait;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Schedules\Events\ActiveScheduleWasRequested;

class EloquentConferenceScheduleRepository implements ConferenceScheduleRepositoryInterface {

    use EventGenerator, SessionGroupTrait;

    private $personalScheduleRepo;

    function __construct(EloquentPersonalScheduleRepository $personalScheduleRepo)
    {
        $this->personalScheduleRepo = $personalScheduleRepo;
    }


    public function getAllForConference($id){
		//$schedueles = ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->where('active', '=', true)->get();

		return ConferenceSchedule::with('sessions')->where('conference_id', $id)->get();
	}

    /**
     * Get the active ConferenceSchedule for a conference
     *
     * @param $conference_id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function getActiveScheduleForConference($conference_id)
    {
        $conference = Conference::findOrFail($conference_id);

        $activeSchedule = ConferenceSchedule::with('sessions.speakers')->find($conference['active_schedule_id']);

        if(! $activeSchedule)
        {
            $activeSchedule = ConferenceSchedule::where('conference_id', $conference->id)->first() ?: ConferenceSchedule::create(compact('conference_id'));

            $conference['active_schedule_id'] = $activeSchedule->id;

            $conference->save();
        }

        $this->raise(new ActiveScheduleWasRequested($activeSchedule));

        return $activeSchedule;
    }

    /**
     * Get the sessions for a specific schedule
     *
     * @param $schedule
     * @return mixed
     */
    public function getSessionsForSchedule($schedule)
    {
        $sessions = $schedule->sessions;

        return $this->calculateParallelSessions($sessions);
    }

    /**
     * Add a true/false field to the schedule indicating
     * that a session is within the users personal
     * schedule or not.
     *
     * @param $conference_id
     * @param $user_id
     * @param $conferenceSchedule
     * @return mixed
     */
    public function checkPersonalSchedule($conference_id, $user_id, $conferenceSchedule)
    {
        $personalSchedule = $this->personalScheduleRepo->getOrCreatePersonalSchedule($conference_id, $user_id);

        foreach ($conferenceSchedule->sessions as $conferenceSession)
        {
            foreach ($personalSchedule->sessions as $personalSession)
            {
                if ($conferenceSession->id == $personalSession->id)
                {
                    // I could find the conference session in the users
                    // personal schedule
                    $conferenceSession['in_personal_schedule'] = true;
                    break;
                }
            }

            // Did I find the conference session in the users
            // personal schedule? If I did not, I'll add
            // the field that i could not find it
            $conferenceSession['in_personal_schedule'] ?: $conferenceSession['in_personal_schedule'] = false;
        }

        return $conferenceSchedule;
    }
}