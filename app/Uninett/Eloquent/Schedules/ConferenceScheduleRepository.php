<?php namespace Uninett\Eloquent\Schedules;

class ConferenceScheduleRepository {

	public function find($id){
		//$schedueles = ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->where('active', '=', true)->get();

        // TODO: Change the name of the method.
        // Metodenavnet er missvisende med tanke på konvensjon. Foreslår getAllForConference($id)
		return ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->get();
	}
}