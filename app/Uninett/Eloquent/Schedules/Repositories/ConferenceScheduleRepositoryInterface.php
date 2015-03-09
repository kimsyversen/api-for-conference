<?php namespace Uninett\Eloquent\Schedules\Repositories;

interface ConferenceScheduleRepositoryInterface
{
    public function getAllForConference($id);

    /**
     * Get the active ConferenceSchedule for a conference
     *
     * @param $conference_id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function getActiveScheduleForConference($conference_id);

    /**
     * Get the sessions for a specific schedule
     *
     * @param $schedule
     * @return mixed
     */
    public function getSessionsForSchedule($schedule);
}