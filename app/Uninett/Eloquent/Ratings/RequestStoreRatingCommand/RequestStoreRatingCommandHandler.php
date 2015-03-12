<?php namespace Uninett\Eloquent\Ratings\RequestStoreRatingCommand;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Uninett\Eloquent\Ratings\Rating;
use Uninett\Eloquent\Ratings\Repositories\EloquentRatingRepository;

class RequestStoreRatingCommandHandler implements CommandHandler {

    use DispatchableTrait;

    private $ratingRepository;

    function __construct(EloquentRatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed|Rating
     */
    public function handle($command)
    {
        $rating = $this->ratingRepository->postSessionRating($command->conference_id, $command->session_id, $command->user_id, $command->score, $command->comment);

        $this->dispatchEventsFor($this->ratingRepository);

        return $rating;
    }

}