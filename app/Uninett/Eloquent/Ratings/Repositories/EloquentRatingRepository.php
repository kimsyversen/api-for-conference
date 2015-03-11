<?php namespace Uninett\Eloquent\Ratings\Repositories;


use Uninett\Eloquent\Ratings\Rating;

class EloquentRatingRepository {


    /**
     * Check if the user can rate a session
     *
     * @param $conference_id
     * @param $session_id
     * @param $user_id
     * @return bool
     */
    public function userCanRateSession($conference_id, $session_id, $user_id)
    {
        // TODO: Check that the user is registered at the conference
        // TODO: Check if the session is done (one can't rate what one hasn't seen)
        // TODO: Check if the user has attended the conference

        // Check if the user has given a rating to the session
        $rating = Rating::where('user_id', $user_id)
            ->where('ratable_id', $session_id)
            ->where('ratable_type', 'Uninett\Eloquent\Sessions\Session')->first();

        return empty($rating);
    }
}