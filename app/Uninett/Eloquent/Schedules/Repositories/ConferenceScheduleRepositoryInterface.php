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

    /**
     * Add a true/false field to the schedule indicating
     * that a session is within the users personal
     * schedule or not.
     *
     * @param $conference_id
     * @param $user_id
     * @param $conferenceSchedule
     * @return mixed
     */
    public function checkPersonalSchedule($conference_id, $user_id, $conferenceSchedule);
}