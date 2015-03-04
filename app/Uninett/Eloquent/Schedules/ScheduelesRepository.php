<?php namespace Uninett\Eloquent\Schedules;

class ScheduelesRepository {

	public function find($id){
		//$schedueles = ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->where('active', '=', true)->get();
		return ConferenceSchedule::with('sessions')->where('conference_id', '=', $id)->get();
	}
}