<?php namespace Uninett\Eloquent\Ratings\RequestStoreRatingCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Ratings\Rating;
use Uninett\Eloquent\Ratings\Repositories\EloquentRatingRepository;

class RequestStoreRatingCommandHandler implements CommandHandler {

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
        return $this->ratingRepository->postRating($command->conference_id, $command->session_id, $command->user_id, $command->score, $command->comment);
    }

}