<?php namespace Uninett\Eloquent\Schedules\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Schedules\Events\ActiveScheduleWasRequested;

class EloquentConferenceScheduleRepository implements ConferenceScheduleRepositoryInterface {

    use EventGenerator;

	public function getAllForConference($id){
		//$schedueles = ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->where('active', '=', true)->get();

		return ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->get();
	}

    /**
     * Get the active ConferenceSchedule for a conference
     *
     * @param $conference_id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function getActiveScheduleForConference($conference_id)
    {
        $activeScheduleId = Conference::findOrFail($conference_id)['active_schedule_id'];

        $activeSchedule = ConferenceSchedule::with('sessions')->findOrFail($activeScheduleId);

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
        return $schedule->sessions;
    }
}