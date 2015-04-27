<?php namespace Uninett\Eloquent\Ratings\RequestCreateConferenceRatingCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Ratings\Repositories\EloquentConferenceRatingRepository;

class RequestCreateConferenceRatingCommandHandler implements CommandHandler {

    private $conferenceRatingRepo;

    function __construct(EloquentConferenceRatingRepository $conferenceRatingRepo)
    {
        $this->conferenceRatingRepo = $conferenceRatingRepo;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed|string
     */
    public function handle($command)
    {
        return $this->conferenceRatingRepo->getCreateConferenceRatingStatuses($command->conference_id, $command->user_id);
    }

}