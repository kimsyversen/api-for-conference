<?php namespace Uninett\Eloquent\Ratings\Repositories;


use Carbon\Carbon;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Ratings\Events\SessionWasRated;
use Uninett\Eloquent\Ratings\Rating;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Exceptions\NotRateableException;

class EloquentRatingRepository {

    use EventGenerator;

    /**
     * @var
     */
    private $session;

    /**
     * Post a rating for a session
     *
     * @param $conference_id
     * @param $session_id
     * @param $user_id
     * @param $score
     * @param $comment
     * @return Rating
     * @throws NotRateableException
     */
    public function postSessionRating($conference_id, $session_id, $user_id, $score, $comment)
    {
        $this->session = $this->getSession($session_id);

        $errors = $this->getCreateSessionRatingErrors($conference_id, $session_id, $user_id);

        if (! empty($errors))
            throw new NotRateableException('unratable', $errors, 422);

        $rating = new Rating([
            'user_id' => $user_id,
            'score' => $score,
            'text' => $comment
        ]);

        $this->session->ratings()->save($rating);

        $this->raise(new SessionWasRated($rating));

        return $rating;
    }

    /**
     * Check if the user can rate a session
     *
     * @param $conference_id
     * @param $session_id
     * @param $user_id
     * @return array
     * @throws NotRateableException
     */
    public function getCreateSessionRatingErrors($conference_id, $session_id, $user_id)
    {
        $this->session = $this->getSession($session_id);

        $errors = [];

        // Check that the session is on the right conference
        if ($this->session->conference->id != $conference_id)
            $errors[] = [
                'code' => 0,
                'message' => 'The session is not hosted by the current conference.'
            ];

        // Check that the session is done (one can't rate what one hasn't seen)
        if ($this->session->end_time > Carbon::now())
            $errors[] = [
                'code' => 1,
                'message' => 'The session must end before it can be rated.'
            ];


        // TODO: Check that the user has attended the session
        // TODO: Check that the user is registered at the conference

        // Check if the user has given a rating to the session
        $rating = Rating::where('user_id', $user_id)
            ->where('ratable_id', $session_id)
            ->where('ratable_type', 'Uninett\Eloquent\Sessions\Session')->first();

        if (! empty($rating))
            $errors[] = [
                'code' => 2,
                'message' => 'The user has already rated this session.'
            ];

        return $errors;
    }

    public function canUserRateSession($conference_id, $session_id, $user_id)
    {
        $errors = $this->getCreateSessionRatingErrors($conference_id, $session_id, $user_id);

        return [
            'rateable' => empty($errors),
            'errors' => $errors
        ];

    }

    /**
     * Get the session for the conference
     *
     * @param $session_id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|static
     */
    private function getSession($session_id)
    {
        return $this->session ?: Session::with('conference')->findOrFail($session_id);
    }
}