<?php namespace Uninett\Eloquent\Ratings\RequestCreateRatingCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Ratings\Repositories\EloquentRatingRepository;

class RequestCreateRatingCommandHandler implements CommandHandler {

    private $ratingRepository;

    function __construct(EloquentRatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->ratingRepository->userCanRateSession($command->conference_id, $command->session_id, $command->user_id);
    }

}