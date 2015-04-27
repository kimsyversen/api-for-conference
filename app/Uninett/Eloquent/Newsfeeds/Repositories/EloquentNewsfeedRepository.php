<?php namespace Uninett\Eloquent\Newsfeeds\Repositories;


use Uninett\Eloquent\Conferences\Conference;

class EloquentNewsfeedRepository {

    private $conference;

    private function getConference($conference_id)
    {
        return $this->conference ?: $this->conference = Conference::with('newsfeeds')->with('newsfeeds.newsposts')->findOrFail($conference_id);
    }

    public function getOrCreateNewsfeedForConference($conference_id)
    {
        $newsfeed = $this->getConference($conference_id)->newsfeeds->first();

        $newsfeed ?: $newsfeed = $this->getConference($conference_id)->newsfeeds()->create([]);

        $newsfeed->newsposts->sortByDesc('created_at');

        return $newsfeed;
    }

//    public function getNewspostsForNewsfeed($newsfeed)
//    {
//        return $newsfeed->newsposts;
//    }

//    /**
//     * Get or create the personal schedule for a user on a conference
//     *
//     * @param $conference_id
//     * @param $user_id
//     * @return \Illuminate\Database\Eloquent\Model
//     */
//    public function getOrCreatePersonalSchedule($conference_id, $user_id)
//    {
//        $personalSchedule = $this->getUser($user_id)->personalSchedules->filter(
//            function ($item) use ($conference_id) {
//                return $item->conference_id == $conference_id;
//            })->first();
//
//        $personalSchedule = $personalSchedule ?: $this->getUser($user_id)->personalSchedules()->create([
//            'conference_id' => Conference::findOrFail($conference_id)->id
//        ]);
//
//        return $personalSchedule;
//    }


}