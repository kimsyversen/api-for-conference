<?php namespace Uninett\Eloquent\Sessions\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Sessions\Events\SessionWasRequested;

class EloquentConferenceSessionRepository implements ConferenceSessionRepositoryInterface
{
    use EventGenerator;

    public function getConferenceSession($conference_id, $session_id)
    {
        $conference = Conference::with('sessions')->find($conference_id);

        $session = $conference['sessions']->only($session_id)->first()->toArray();

        $this->raise(new SessionWasRequested($session));

        return $session;

    }

}