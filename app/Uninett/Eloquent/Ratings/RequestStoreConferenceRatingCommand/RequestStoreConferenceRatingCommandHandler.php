<?php namespace Uninett\Eloquent\Ratings\RequestStoreConferenceRatingCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Ratings\Repositories\EloquentConferenceRatingRepository;

class RequestStoreConferenceRatingCommandHandler implements CommandHandler {

    private $conferenceRatingRepo;

    function __construct(EloquentConferenceRatingRepository $conferenceRatingRepo)
    {
        $this->conferenceRatingRepo = $conferenceRatingRepo;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $response = $this->conferenceRatingRepo->postConferenceRating($command->conference_id, $command->user_id, $command->score, $command->comment);

        return $response;
    }

}