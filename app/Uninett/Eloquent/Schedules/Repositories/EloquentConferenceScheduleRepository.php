<?php namespace Uninett\Eloquent\Schedules\Repositories;

use Carbon\Carbon;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Schedules\ConferenceSchedule;
use Uninett\Eloquent\Schedules\Events\ActiveScheduleWasRequested;

class EloquentConferenceScheduleRepository implements ConferenceScheduleRepositoryInterface {

    use EventGenerator;

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
        $sessions = $schedule->sessions;

        return $this->calculateParallelSessions($sessions);
    }

    /**
     * @param $sessions
     * @return array
     */
    private function calculateParallelSessions($sessions)
    {
        $sessions = $sessions->sortBy('start_time')->toArray();

        $result = [];

        while (!empty($sessions)) {
            $paralell_sessions[] = array_shift($sessions);
            $begins_at = Carbon::createFromFormat('Y-m-d H:i:s', $paralell_sessions[0]['start_time']);
            $ends_at = Carbon::createFromFormat('Y-m-d H:i:s', $paralell_sessions[0]['end_time']);

            $next_sessions_array = [];

            foreach ($sessions as $session) {
                $session_start_time = Carbon::createFromFormat('Y-m-d H:i:s', $session['start_time']);
                $session_end_time = Carbon::createFromFormat('Y-m-d H:i:s', $session['end_time']);

                if ($session_start_time->between($begins_at, $ends_at)) {
                    $paralell_sessions[] = $session;
                    if ($ends_at < $session_end_time)
                        $ends_at = $session_end_time;
                } else
                    $next_sessions_array[] = $session;
            }

            $paralell_sessions = ['sessions' => $paralell_sessions];
            $paralell_sessions['start_time'] = $begins_at;
            $paralell_sessions['end_time'] = $ends_at;

            $result[] = $paralell_sessions;
            $paralell_sessions = [];
            $sessions = $next_sessions_array;
        }

        return $result; //['parallels' => $result];
    }

//    /**
//     * Get the sessions for a specific schedule
//     *
//     * @param $schedule
//     * @return mixed
//     */
//    public function getSessionsForSchedule($schedule)
//    {
//        return $schedule->sessions;
//    }
}