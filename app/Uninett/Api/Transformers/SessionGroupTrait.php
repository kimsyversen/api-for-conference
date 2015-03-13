<?php namespace Uninett\Api\Transformers;


use Carbon\Carbon;

trait SessionGroupTrait {

    /**
     * @param $sessions
     * @return array
     */
    public function calculateParallelSessions($sessions)
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

}