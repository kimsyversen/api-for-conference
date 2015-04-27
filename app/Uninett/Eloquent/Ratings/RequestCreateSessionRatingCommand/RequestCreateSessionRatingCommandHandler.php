<?php namespace Uninett\Eloquent\Ratings\RequestCreateSessionRatingCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Ratings\Repositories\EloquentSessionRatingRepository;

class RequestCreateSessionRatingCommandHandler implements CommandHandler {

    private $ratingRepository;

    function __construct(EloquentSessionRatingRepository $ratingRepository)
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
        return $this->ratingRepository->getCreateSessionRatingStatuses($command->conference_id, $command->session_id, $command->user_id);
    }

}