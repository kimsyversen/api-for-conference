<?php namespace Uninett\Eloquent\Schedules\Repositories;

use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\ConferenceSchedule;

class ConferenceScheduleRepository {

	public function find($id){
		//$schedueles = ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->where('active', '=', true)->get();

        // TODO: Change the name of the method.
        // Metodenavnet er missvisende med tanke på konvensjon. Foreslår getAllForConference($id)
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

        return ConferenceSchedule::with('sessions')->findOrFail($activeScheduleId);
    }

    public function getSessionsForSchedule($schedule)
    {
        return $schedule->sessions;
    }
}