<?php namespace Uninett\Eloquent\Schedules\Repositories;


use Laracasts\Commander\Events\EventGenerator;
use Uninett\Api\Transformers\SessionGroupTrait;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\Events\SessionWasDeletedFromPersonalSchedule;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Eloquent\Users\User;
use Uninett\Exceptions\FormValidationException;
use Uninett\Eloquent\Schedules\Events\SessionWasAddedToPersonalSchedule;

class EloquentPersonalScheduleRepository {

    use EventGenerator, SessionGroupTrait;

    private $user;

    private function getUser($user_id)
    {
        return $this->user ?: $this->user = User::with('personalSchedules')->with('personalSchedules.sessions')->findOrFail($user_id);
    }

    /**
     * Get or create the personal schedule for a user on a conference
     *
     * @param $conference_id
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getOrCreatePersonalSchedule($conference_id, $user_id)
    {
        $personalSchedule = $this->getUser($user_id)->personalSchedules->filter(
            function ($item) use ($conference_id) {
                return $item->conference_id == $conference_id;
            })->first();

        $personalSchedule = $personalSchedule ?: $this->getUser($user_id)->personalSchedules()->create([
            'conference_id' => Conference::findOrFail($conference_id)->id
        ]);

        return $personalSchedule;
    }

    public function addSession($conference_id, $user_id, $session_id)
    {
        $personalSchedule = $this->getOrCreatePersonalSchedule($conference_id, $user_id);

        if ($personalSchedule->sessions->find($session_id))
        {
            throw new FormValidationException('add_session_violation', ['Session already exists in the personal schedule.']);
        }

        $session = Session::findOrFail($session_id);

        $personalSchedule->sessions()->save($session);

        $this->raise(new SessionWasAddedToPersonalSchedule($personalSchedule, $session));

        return $session;
    }

    public function removeSession($conference_id, $session_id, $user_id)
    {
        $personalSchedule = $this->getOrCreatePersonalSchedule($conference_id, $user_id);

        $session = $personalSchedule->sessions->find($session_id);

        if (! $session)
        {
            throw new FormValidationException('remove_session_violation', ['Session does not exist in the personal schedule.']);
        }

        $personalSchedule->sessions()->detach($session->id);

        $this->raise(new SessionWasDeletedFromPersonalSchedule($personalSchedule, $session));

        return $session;
    }

}