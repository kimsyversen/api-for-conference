<?php namespace Uninett\Eloquent\Schedules\Repositories;


use Uninett\Api\Transformers\SessionGroupTrait;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;

class EloquentPersonalScheduleRepository {

    use SessionGroupTrait;

    /**
     * Get or create the personal schedule for a user on a conference
     *
     * @param $conference_id
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getOrCreatePersonalSchedule($conference_id, $user_id)
    {
        $user = User::with('personalSchedules')->with('personalSchedules.sessions')->findOrFail($user_id);

        $personalSchedule = $user->personalSchedules->filter(
            function ($item) use ($conference_id) {
                return $item->conference_id == $conference_id;
            })->first();

        $personalSchedule = $personalSchedule ?: $user->personalSchedules()->create([
            'conference_id' => Conference::findOrFail($conference_id)->id
        ]);

        return $personalSchedule;
    }

}