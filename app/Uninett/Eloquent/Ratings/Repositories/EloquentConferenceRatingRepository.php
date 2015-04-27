<?php namespace Uninett\Eloquent\Ratings\Repositories;


use Carbon\Carbon;
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Ratings\Events\ConferenceWasRated;
use Uninett\Eloquent\Ratings\Rating;
use Uninett\Exceptions\RatingValidationException;

class EloquentConferenceRatingRepository {

    use EventGenerator;

    /**
     * @var
     */
    private $conference;

    /**
     * Get the conference
     *
     * @param $conference_id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|static
     */
    private function getConference($conference_id)
    {
        return $this->conference ?: $this->conference = Conference::findOrFail($conference_id);
    }

    /**
     * Post a rating for a conference
     *
     * @param $conference_id
     * @param $user_id
     * @param $score
     * @param $comment
     * @return Rating
     * @throws RatingValidationException
     */
    public function postConferenceRating($conference_id, $user_id, $score, $comment)
    {
        $errors = $this->getCreateConferenceRatingErrors($conference_id, $user_id);

        if (! empty($errors))
            throw new RatingValidationException('unratable', $errors, 422);

        $rating = new Rating([
            'user_id' => $user_id,
            'score' => $score,
            'text' => $comment
        ]);

        $this->getConference($conference_id)->ratings()->save($rating);

        $this->raise(new ConferenceWasRated($rating));

        return $rating;
    }

    public function getCreateConferenceRatingErrors($conference_id, $user_id)
    {
        $statuses = $this->getCreateConferenceRatingStatuses($conference_id, $user_id);

        $errors = [];

        if ($statuses[0]['code'] != 0)
            foreach ($statuses as $status)
            {
                $errors[] = [$status['message']];
            }

        return $errors;
    }

    /**
     * Check that the user can rate the conference
     *
     * @param $conference_id
     * @param $user_id
     * @return array
     */
    public function getCreateConferenceRatingStatuses($conference_id, $user_id)
    {
        $status = [];

        // Check that the conference is done (one can't rate what one hasn't seen)
        if ($this->getConference($conference_id)->end_date > Carbon::now())
            $status[] = [
                'code' => 1,
                'message' => 'The conference must end before it can be rated.'
            ];

        // TODO: Check that the user is registered at the conference

        // Check if the user has given a rating to the conference
        $rating = Rating::where('user_id', $user_id)
            ->where('ratable_id', $conference_id)
            ->where('ratable_type', 'Uninett\Eloquent\Conferences\Conference')->first();

        if (!empty($rating))
            $status[] = [
                'code' => 2,
                'message' => 'The user has already rated this conference.'
            ];

        if (empty($status))
            $status[] = [
                'code' => 0,
                'message' => 'The user can rate this conference.'
            ];

        return $status;
    }


}