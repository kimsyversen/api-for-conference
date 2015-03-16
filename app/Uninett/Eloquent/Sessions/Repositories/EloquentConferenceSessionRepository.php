<?php namespace Uninett\Eloquent\Sessions\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\Repositories\EloquentPersonalScheduleRepository;
use Uninett\Eloquent\Sessions\Events\SessionWasRequested;

class EloquentConferenceSessionRepository implements ConferenceSessionRepositoryInterface
{
    use EventGenerator;

    private $personalScheduleRepo;

    function __construct(EloquentPersonalScheduleRepository $personalScheduleRepo)
    {
        $this->personalScheduleRepo = $personalScheduleRepo;
    }

    /**
     * @param $conference_id
     * @param $session_id
     * @return mixed
     */
    public function getConferenceSession($conference_id, $session_id)
    {
        $conference = Conference::with('sessions')->with('sessions.ratings')->with('sessions.questions')->findOrFail($conference_id);

        $session = $conference['sessions']->only($session_id)->first();

        if (empty($session)) throw new ModelNotFoundException;

        $this->raise(new SessionWasRequested($session));

        return $session;
    }

    public function checkPersonalProgram($conference_id, $user_id, $session)
    {
        $personalSchedule = $this->personalScheduleRepo->getOrCreatePersonalSchedule($conference_id, $user_id);

        foreach ($personalSchedule->sessions as $personalSession)
        {
            if ($session->id == $personalSession->id)
            {
                // I could find the conference session in the users
                // personal schedule
                $session['in_personal_schedule'] = true;
                break;
            }
        }

        // Did I find the conference session in the users
        // personal schedule? If I did not, I'll add
        // the field that i could not find it
        $session['in_personal_schedule'] ?: $session['in_personal_schedule'] = false;

        return $session;
    }
}