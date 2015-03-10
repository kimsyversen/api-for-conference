<?php namespace Uninett\Eloquent\Sessions\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Sessions\Events\SessionWasRequested;

class EloquentConferenceSessionRepository implements ConferenceSessionRepositoryInterface
{
    use EventGenerator;

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

}